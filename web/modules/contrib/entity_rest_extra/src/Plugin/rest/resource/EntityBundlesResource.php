<?php

namespace Drupal\entity_rest_extra\Plugin\rest\resource;

use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\node\Entity\NodeType;
use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;
use Drupal\Core\Session\AccountProxyInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Psr\Log\LoggerInterface;

/**
 * Provides a resource to get bundles by entity.
 *
 * @RestResource(
 *   id = "entity_bundles",
 *   label = @Translation("Bundles by entity"),
 *   uri_paths = {
 *     "canonical" = "/entity/{entity_type}/bundles"
 *   }
 * )
 */
class EntityBundlesResource extends ResourceBase {

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
   * @param \Drupal\Core\Session\AccountProxyInterface $current_user
   *   The current user.
   */
  public function __construct(
    array                      $configuration,
                               $plugin_id,
                               $plugin_definition,
    array                      $serializer_formats,
    LoggerInterface            $logger,
    EntityTypeManagerInterface $entity_type_manager,
    AccountProxyInterface      $current_user) {
    parent::__construct($configuration, $plugin_id, $plugin_definition, $serializer_formats, $logger);
    $this->entityTypeManager = $entity_type_manager;
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
      $container->get('current_user')
    );
  }

  /**
   * Responds to GET requests.
   *
   * Returns a list of bundles for specified entity.
   *
   * @param string $entity_type
   *
   * @return \Drupal\rest\ResourceResponse
   *   The response containing a list of bundle names.
   *
   * @throws \Drupal\Component\Plugin\Exception\InvalidPluginDefinitionException
   * @throws \Drupal\Component\Plugin\Exception\PluginNotFoundException
   */
  public function get(string $entity_type): ResourceResponse {
    if ($entity_type) {
      /** @var \Drupal\Core\Entity\EntityTypeBundleInfo  $bundleInfo */
      $bundleTypeInfo = \Drupal::service('entity_type.bundle.info');
      $bundleInfo = $bundleTypeInfo->getBundleInfo($entity_type);

      if ($entity_type == 'node') {
        foreach ($bundleInfo AS $bundle_id => &$bundle) {
          $bundle['description'] = NodeType::load($bundle_id)->getDescription();
        }
      }

      return new ResourceResponse($bundleInfo);
    }

    throw new BadRequestHttpException($this->t("Entity type wasn't provided."));
  }

}
