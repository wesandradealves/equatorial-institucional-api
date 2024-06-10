<?php

namespace Drupal\sys_twig_extensions\Plugin\rest\resource;
use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Provides a resource for clients subscription to updates.
 *
 * @RestResource(
 *   id = "custom_rest_resource_taxonomy",
 *   label = @Translation("Taxonomy Endpoint"),
 *   uri_paths = {
 *     "canonical" = "/api/taxonomy/{id}",
 *     "create" = "/api/taxonomy/{id}"
 *   }
 * )
 */
class TaxonomiesResource extends ResourceBase {

  /**
   *
   */
  public function permissions() {
    return [];
  }

  /**
   *
   */
  public function get($id) {
    $response = is_numeric($id) ? \Drupal::entityTypeManager()->getStorage('taxonomy_term')->load($id) : \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadTree($id, 0, TRUE, TRUE);

    return (new ResourceResponse($response))->addCacheableDependency([
      '#cache' => [
        'max-age' => 0,
      ],
    ]);
  }
}
