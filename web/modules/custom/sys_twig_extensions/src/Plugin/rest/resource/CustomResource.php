<?php

namespace Drupal\sys_twig_extensions\Plugin\rest\resource;
use Drupal\file\Entity\File;
use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;

/**
 * Provides a resource for clients subscription to updates.
 *
 * @RestResource(
 *   id = "custom_rest_resource",
 *   label = @Translation("Sys Manager Custom Tweaks & Resources"),
 *   uri_paths = {
 *     "canonical" = "/api/config",
 *     "create" = "/api/config"
 *   }
 * )
 */
class CustomResource extends ResourceBase {

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
      'copyright' => theme_get_setting('copyright'),
      'logo' => \Drupal::service('file_url_generator')->generateAbsoluteString(theme_get_setting('logo.url')),
      'favico' => \Drupal::service('file_url_generator')->generateAbsoluteString(theme_get_setting('favicon.url'))
    ]))->addCacheableDependency([
      '#cache' => [
        'max-age' => 0,
      ],
    ]);
  }
}
