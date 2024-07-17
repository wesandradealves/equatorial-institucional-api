<?php

namespace Drupal\entity_rest_extra\Plugin\rest\resource;

use Drupal\Core\Session\AccountProxyInterface;
use Drupal\field\Entity\FieldConfig;
use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Psr\Log\LoggerInterface;

/**
 * Provides a resource to get view modes by entity and bundle.
 *
 * @RestResource(
 *   id = "Entity Bundle Resource Label",
 *   label = @Translation("Fields by entity bundle"),
 *   uri_paths = {
 *     "canonical" = "/entity/{entity_type}/{bundle}/fields"
 *   }
 * )
 */
class EntityBundleFieldsResource extends ResourceBase {

  /**
   *  The current user instance.
   *
   * @var \Drupal\Core\Session\AccountProxyInterface
   */
  protected $currentUser;

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
   * @param \Drupal\Core\Session\AccountProxyInterface $current_user
   *   The current user.
   */
  public function __construct(
    array                 $configuration,
                          $plugin_id,
                          $plugin_definition,
    array                 $serializer_formats,
    LoggerInterface       $logger,
    AccountProxyInterface $current_user) {
    parent::__construct($configuration, $plugin_id, $plugin_definition, $serializer_formats, $logger);
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
   *   The response.
   */
  public function get(string $entity_type, string $bundle): ResourceResponse {
    if ($entity_type && $bundle) {
      // Query by filtering on the ID by entity and bundle.
      $ids = \Drupal::entityQuery('field_config')
        ->condition('id', $entity_type . '.' . $bundle . '.', 'STARTS_WITH')
        ->execute();

      // Fetch all fields and key them by field name.
      $field_configs = FieldConfig::loadMultiple($ids);
      $fields = [];
      foreach ($field_configs as $field_instance) {
        $field_storage = $field_instance->getFieldStorageDefinition();
        $fields[$field_instance->getName()]['field_config'] = $field_instance;
        $fields[$field_instance->getName()]['field_storage'] = $field_storage;
      }

      if (!empty($fields)) {
        return new ResourceResponse($fields);
      }

      throw new NotFoundHttpException($this->t('Field for entity @entity and bundle @bundle was not found.', [
        '@entity' => $entity_type,
        '@bundle' => $bundle,
      ]));
    }

    // Throw an exception if it is required.
    throw new BadRequestHttpException($this->t("Entity and Bundle weren't provided."));
  }

}
