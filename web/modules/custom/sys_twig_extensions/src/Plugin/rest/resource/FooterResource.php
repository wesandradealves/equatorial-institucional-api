<?php

namespace Drupal\sys_twig_extensions\Plugin\rest\resource;
use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;
use Drupal\media\Entity\Media;
use Drupal\file\Entity\File;

/**
 * Provides a resource for clients subscription to updates.
 *
 * @RestResource(
 *   id = "custom_rest_resource_footer",
 *   label = @Translation("Footer Endpoint"),
 *   uri_paths = {
 *     "canonical" = "/api/footer",
 *     "create" = "/api/footer"
 *   }
 * )
 */
class FooterResource extends ResourceBase {

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

    if(theme_get_setting('app_store_img') && theme_get_setting('app_store_img')[0]) {
        if(\Drupal::entityTypeManager()->getStorage('file')->load(theme_get_setting('app_store_img')[0])) {
          $app_store_img = \Drupal::entityTypeManager()->getStorage('file')->load(theme_get_setting('app_store_img')[0])->getFileUri();
          if($app_store_img) {
            $app_store_img = \Drupal::service('file_url_generator')->generateAbsoluteString($app_store_img);
          }
        }
    }

    if(theme_get_setting('google_play_img') && theme_get_setting('google_play_img')[0]) {
        if(\Drupal::entityTypeManager()->getStorage('file')->load(theme_get_setting('google_play_img')[0])) {
          $google_play_img = \Drupal::entityTypeManager()->getStorage('file')->load(theme_get_setting('google_play_img')[0])->getFileUri();
          if($google_play_img) {
            $google_play_img = \Drupal::service('file_url_generator')->generateAbsoluteString($google_play_img);
          }
        }
    }
    
    if(theme_get_setting('talk_to_clara_img') && theme_get_setting('talk_to_clara_img')[0]) {
        if(\Drupal::entityTypeManager()->getStorage('file')->load(theme_get_setting('talk_to_clara_img')[0])) {
          $talk_to_clara_img = \Drupal::entityTypeManager()->getStorage('file')->load(theme_get_setting('talk_to_clara_img')[0])->getFileUri();
          if($talk_to_clara_img) {
            $talk_to_clara_img = \Drupal::service('file_url_generator')->generateAbsoluteString($talk_to_clara_img);
          }
        }
    }    

    return (new ResourceResponse([
      'data' => [
        'social_networks' => [
            'links' => [
              'facebook' => theme_get_setting('facebook'),
              'twitter' => theme_get_setting('twitter'),
              'instagram' => theme_get_setting('instagram'),
              'youtube' => theme_get_setting('youtube'),
            ],
            'label' => [
                'pt_br' => theme_get_setting('social_networks_label'),
                'en' => theme_get_setting('social_networks_label_en')
            ],            
        ],
        'store' => [
            'links' => [
              'appstore' => [
                  'img' => isset($app_store_img) ? $app_store_img : null,
                  'url' => theme_get_setting('app_store_url'),
              ],
              'googleplay' => [
                  'img' => isset($google_play_img) ? $google_play_img : null,
                  'url' => theme_get_setting('google_play_url'),
              ]   
            ],
            'label' => [
                'pt_br' => theme_get_setting('app_label'),
                'en' => theme_get_setting('app_label_en')
            ],                          
        ],
        'contact' => [
            'phone' => [
                'pt_br' => theme_get_setting('phone')['value'],
                'en' => theme_get_setting('phone_en')['value']
            ],
            'talktous' => [
                'pt_br' => theme_get_setting('talk'),
                'en' => theme_get_setting('talk_en'),
                'link' => [
                  'label' => [
                    'pt_br' => theme_get_setting('talk_label'),
                    'en' => theme_get_setting('talk_label_en'),
                  ],
                  'url' => theme_get_setting('talk_url')
                ]        
            ],
            'talktoclara' => [
                'pt_br' => theme_get_setting('talk_to_clara'),
                'en' => theme_get_setting('talk_to_clara_en'),
                'link' => [
                  'label' => [
                    'pt_br' => theme_get_setting('talk_to_clara_label'),
                    'en' => theme_get_setting('talk_to_clara_label_en'),
                  ],
                  'url' => theme_get_setting('talk_to_clara_url')
                ],
                'img' => isset($talk_to_clara_img) ? $talk_to_clara_img : null
            ]                          
        ]        
      ] 
    ]))->addCacheableDependency([
      '#cache' => [
        'max-age' => 0,
      ],
    ]);
  }
}
