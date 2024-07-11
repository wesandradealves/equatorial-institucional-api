<?php

namespace Drupal\entity_rest_extra\Plugin\rest\resource;

use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Session\AccountProxyInterface;
use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Psr\Log\LoggerInterface;

/**
 * Provides a resource to get view modes by entity and bundle.
 *
 * @RestResource(
 *   id = "bundle_view_modes",
 *   label = @Translation("View modes by entity bundle"),
 *   uri_paths = {
 *     "canonical" = "/entity/{entity_type}/{bundle}/view_modes"
 *   }
 * )
 */
class EntityBundleViewModesResource extends ResourceBase {

  /**
   *  The current user instance.
   *
   * @var \Drupal\Core\Session\AccountProxyInterface
   */
  protected $currentUser;

  /**
   *  The instance of the entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManager
   */
  protected $entityTypeManager;

  /**
   * The configuration factory.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * Constructs a Drupal\rest\Plugin\ResourceBase object.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param array $serializer_formats
   *   The available serialization formats.
   * @param \Psr\Log\LoggerInterface $logger
   *   A logger instance.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The config factory.
   * @param \Drupal\Core\Session\AccountProxyInterface $current_user
   *   The current user.
   */
  public function __construct(
    array                      $configuration,
                               $plugin_id, $plugin_definition,
    array                      $serializer_formats,
    LoggerInterface            $logger,
    EntityTypeManagerInterface $entity_type_manager,
    ConfigFactoryInterface     $config_factory,
    AccountProxyInterface      $current_user) {
    parent::__construct($configuration, $plugin_id, $plugin_definition, $serializer_formats, $logger);
    $this->entityTypeManager = $entity_type_manager;
    $this->configFactory = $config_factory;
    $this->currentUser = $current_user;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->getParameter('serializer.formats'),
      $container->get('logger.factory')->get('rest'),
      $container->get('entity_type.manager'),
      $container->get('config.factory'),
      $container->get('current_user')
    );
  }

  /**
   * Responds to GET requests.
   *
   * Returns a list of bundles for specified entity.
   *
   * @param string $entity_type
   * @param string $bundle
   *
   * @return \Drupal\rest\ResourceResponse
   *   The response containing a list of bundle view modes.
   *
   * @throws \Drupal\Component\Plugin\Exception\PluginNotFoundException
   */
  public function get(string $entity_type, string $bundle): ResourceResponse {
    if ($entity_type && $bundle) {
      $entity_view_display = $this->entityTypeManager->getDefinition('entity_view_display');
      $config_prefix = $entity_view_display->getConfigPrefix();
      $list = $this->configFactory->listAll($config_prefix . '.' . $entity_type . '.' . $bundle . '.');

      $view_modes = [];
      foreach ($list as $view_mode) {
        $view_mode_machine_id = str_replace($config_prefix . '.', '', $view_mode);
        [, , $view_mode_label] = explode('.', $view_mode_machine_id);
        $view_modes[$view_mode_machine_id] = $view_mode_label;
      }

      if (!empty($view_modes)) {
        return new ResourceResponse($view_modes);
      }

      throw new NotFoundHttpException(t('Views modes for @entity and @bundle were not found.', [
        '@entity' => $entity_type,
        '@bundle' => $bundle,
      ]));
    }

    throw new BadRequestHttpException($this->t("Entity or Bundle weren't provided."));
  }

}
