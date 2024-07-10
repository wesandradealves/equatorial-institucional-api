<?php

namespace Drupal\sys_twig_extensions\Plugin\rest\resource;
use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;

/**
 * Provides a resource for clients subscription to updates.
 *
 * @RestResource(
 *   id = "custom_rest_resource_header",
 *   label = @Translation("Header Endpoint"),
 *   uri_paths = {
 *     "canonical" = "/api/header",
 *     "create" = "/api/header"
 *   }
 * )
 */
class HeaderResource extends ResourceBase {
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

    $colours = array(
      '#5BD05F' => 'Verde',
      '#FCD403' => 'Amarela',
      '#ea2639' => 'Vermelha',            
    );

    $translations = array(
      '#5BD05F' => 'Green',
      '#FCD403' => 'Yellow',
      '#ea2639' => 'Redd',      
    );    

    return (new ResourceResponse([
      'data' => [
        'text' => [
          'en' => theme_get_setting('text_en'),
          'pt_br' => theme_get_setting('text')
        ],
        'tariff_band' => [
          'label' => [
            'en' => theme_get_setting('tariff_band_label'),
            'pt_br' => theme_get_setting('tariff_band_label_en')
          ],
          'band' => [
            "label" => [
              'en' => $translations[theme_get_setting('band')],
              'pt_br' => theme_get_setting('band')
            ],
            "value" => theme_get_setting('band')
          ]
        ],
        'searchbar' => [
          'en' => theme_get_setting('searchbar'),
          'pt_br' => theme_get_setting('searchbar_en')
        ]        
      ] 
    ]))->addCacheableDependency([
      '#cache' => [
        'max-age' => 0,
      ],
    ]);
  }
}
