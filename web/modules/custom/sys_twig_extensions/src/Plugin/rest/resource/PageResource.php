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
 *     "canonical" = "/api/page",
 *     "create" = "/api/page"
 *   }
 * )
 */
class PageResource extends ResourceBase {

  /**
   * Returns an array of permissions.
   */
  public function permissions() {
    return [];
  }

  /**
   * Handles GET requests for the PageResource.
   *
   * @param string $id
   *   The node ID from the path.
   * @param \Symfony\Component\HttpFoundation\Request $request
   *   The current request object.
   *
   * @return \Drupal\rest\ResourceResponse
   *   The response containing the node data.
   */
  public function get(Request $request) {
    // Retrieve the 'alias' query parameter.
    $alias = $request->query->get('alias');

    // Convert the alias to an internal path.
    $path = \Drupal::service('path_alias.manager')->getPathByAlias($alias);
    $params = Url::fromUri("internal:$path")->getRouteParameters();
    $entity_type = key($params);
    $node = \Drupal::entityTypeManager()->getStorage($entity_type)->load($params[$entity_type]);

    // Return the node data with cacheable dependencies.
    return (new ResourceResponse($node))->addCacheableDependency([
      '#cache' => [
        'max-age' => 0,
      ],
    ]);
  }
}