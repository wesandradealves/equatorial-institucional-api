<?php

namespace Drupal\sys_twig_extensions\Plugin\rest\resource;
use Drupal\Core\Url;
use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Provides a resource for clients subscription to updates.
 *
 * @RestResource(
 *   id = "custom_rest_resource_page",
 *   label = @Translation("Pages Endpoint"),
 *   uri_paths = {
 *     "canonical" = "/api/page/{id}",
 *     "create" = "/api/page/{id}"
 *   }
 * )
 */
class PageResource extends ResourceBase {

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
    $path = \Drupal::service('path_alias.manager')->getPathByAlias("/$id");
    $params = Url::fromUri("internal:$path")->getRouteParameters();
    $entity_type = key($params);
    $node = \Drupal::entityTypeManager()->getStorage($entity_type)->load($params[$entity_type]);

    return (new ResourceResponse($node))->addCacheableDependency([
      '#cache' => [
        'max-age' => 0,
      ],
    ]);
  }
}
