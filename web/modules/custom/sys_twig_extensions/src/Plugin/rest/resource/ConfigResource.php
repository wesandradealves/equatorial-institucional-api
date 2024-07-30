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
    if(theme_get_setting('home_bg')) {
      $bg = theme_get_setting('home_bg');
      $bg = \Drupal\file\Entity\File::load(reset($bg));
      $bg = $bg->createFileUrl();
    }

    return (new ResourceResponse([
      'data' => [
        'copyright' => [
          'en' => theme_get_setting('copyright_en'),
          'pt_br' => theme_get_setting('copyright')
        ],
        'error_page' => [
          'en' => theme_get_setting('error_page_en'),
          'pt_br' => theme_get_setting('error_page'),
        ],
        'site_name' => \Drupal::config('system.site')->get('name'),
        'basePath' => \Drupal::request()->getSchemeAndHttpHost(),
        'logo' => \Drupal::request()->getSchemeAndHttpHost().\Drupal::service('file_url_generator')->generateAbsoluteString(theme_get_setting('logo.url')),
        'location_screen_bg' => isset($bg) ? \Drupal::request()->getSchemeAndHttpHost().$bg : null,
        'favico' => \Drupal::request()->getSchemeAndHttpHost().\Drupal::service('file_url_generator')->generateAbsoluteString(theme_get_setting('favicon.url'))
      ] 
    ]))->addCacheableDependency([
      '#cache' => [
        'max-age' => 0,
      ],
    ]);
  }
}
