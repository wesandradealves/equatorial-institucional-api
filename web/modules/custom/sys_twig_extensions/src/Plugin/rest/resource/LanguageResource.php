<?php

namespace Drupal\sys_twig_extensions\Plugin\rest\resource;
use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;

/**
 * Provides a resource for clients subscription to updates.
 *
 * @RestResource(
 *   id = "custom_rest_resource_languages",
 *   label = @Translation("Available Languages Endpoint"),
 *   uri_paths = {
 *     "canonical" = "/api/languages",
 *     "create" = "/api/languages"
 *   }
 * )
 */
class LanguageResource extends ResourceBase {

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
    $langs = \Drupal::languageManager()->getLanguages();
    $array = [];
  
    foreach ($langs as $key => $lang) {
      $array[$key] = $lang->getName(); 
    }

    return (new ResourceResponse([
      'data' => [
        'languages' => $array
      ] 
    ]))->addCacheableDependency([
      '#cache' => [
        'max-age' => 0,
      ],
    ]);
  }
}
