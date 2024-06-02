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
    // /session/token/
    // $query = \Drupal::request()->query;
    // $params = json_decode($query->get('params'));
    // $action = $params->action;
    // $field = $params->field;
    // $id = $params->id;

    // $response = json_encode($params);

    // if ($action == 'trash') {
    //   $node = \Drupal::entityTypeManager()->getStorage("empresa")->load($id);
    //   $file = $node->get($field)->entity;
    //   $response = [
    //     "status" => $file ? 200 : 404,
    //   ];
    //   if ($file) {
    //     $file->delete();
    //     $node->get($field)->removeItem(0);
    //     $node->save();
    //   }
    // }

    return (new ResourceResponse(['message' => 'Hello, this is a rest service']))->addCacheableDependency([
      '#cache' => [
        'max-age' => 0,
      ],
    ]);
  }

  /**
   *
   */
  // public function post($data) {
  //   $json = json_decode(json_encode($data[1]));

  //   if ($json && $fid = $data[0]) {
  //     $id = $json->id;
  //     $field = $json->field;
  //     $file = File::load($fid);
  //     $file->setPermanent();
  //     $file->status = FILE_STATUS_PERMANENT;
  //     if ($file->save()) {
  //       $node = \Drupal::entityTypeManager()->getStorage('empresa')->load($id);
  //       $node->set($field, ['target_id' => $fid]);
  //       $node->save();
  //     }
  //   }
  //   return (new ResourceResponse([
  //     "status" => $file ? 200 : 404,
  //   ]))->addCacheableDependency([
  //         '#cache' => [
  //           'max-age' => 0,
  //         ],
  //       ]);
  // }

}
