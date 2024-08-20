<?php

namespace Drupal\sys_twig_extensions\Plugin\rest\resource;

use Drupal\Core\Url;
use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Drupal\media\Entity\Media;

/**
 * Provides a resource for clients subscription to updates.
 *
 * @RestResource(
 *   id = "custom_rest_resource_media",
 *   label = @Translation("Media Endpoint"),
 *   uri_paths = {
 *     "canonical" = "/api/media",
 *     "create" = "/api/media"
 *   }
 * )
 */
class MediaResource extends ResourceBase {

  /**
   * Returns an array of permissions.
   */
  public function permissions() {
    return [];
  }

  /**
   * Handles GET requests for the MediaResource.
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
    $fid = $request->query->get('fid');
    $file = \Drupal\file\Entity\File::load($fid);
    
    if($file) {
      $file = $file->createFileUrl();
    }    

    // Return the node data with cacheable dependencies.
    return (new ResourceResponse($file))->addCacheableDependency([
      '#cache' => [
        'max-age' => 0,
      ],
    ]);
  }
}