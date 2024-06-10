<?php

namespace Drupal\sys_twig_extensions\Plugin\rest\resource;
use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;

/**
 * Provides a resource for clients subscription to updates.
 *
 * @RestResource(
 *   id = "custom_rest_resource_config",
 *   label = @Translation("Configuration Endpoint"),
 *   uri_paths = {
 *     "canonical" = "/api/config",
 *     "create" = "/api/config"
 *   }
 * )
 */
class ConfigResource extends ResourceBase {

  /**
   *
   */
  public function permissions() {
    return [];
  }

  /**
   *
   */
  public function get() {
    return (new ResourceResponse([
      'data' => [
        'copyright' => [
          'en' => theme_get_setting('copyright_en'),
          'pt-br' => theme_get_setting('copyright')
        ],
        'logo' => \Drupal::service('file_url_generator')->generateAbsoluteString(theme_get_setting('logo.url')),
        'favico' => \Drupal::service('file_url_generator')->generateAbsoluteString(theme_get_setting('favicon.url'))
      ] 
    ]))->addCacheableDependency([
      '#cache' => [
        'max-age' => 0,
      ],
    ]);
  }
}
