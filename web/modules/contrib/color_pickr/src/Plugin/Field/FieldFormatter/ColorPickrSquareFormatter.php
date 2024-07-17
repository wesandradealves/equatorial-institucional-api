<?php

/**
 * @file
 * Contains \Drupal\color_pickr\Plugin\field\formatter\ColorPickrSquareFormatter.
 */

namespace Drupal\color_pickr\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Plugin implementation of the 'color_pickr_square' formatter.
 *
 * @FieldFormatter(
 *   id = "color_pickr_square",
 *   label = @Translation("Color Pickr Square"),
 *   field_types = {
 *     "color_pickr_code"
 *   }
 * )
 */
class ColorPickrSquareFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = array();
    foreach ($items as $delta => $item) {
      // Render output using color_pickr_square theme.
     if(isset($item->color_pickr) && $item->color_pickr != 'none') {
      $source = array(
        '#theme' => 'color_pickr_square',
        '#color_pickr' => $item->color_pickr,
      );
      $elements[$delta] = array('#markup' => \Drupal::service('renderer')->render($source));
    }
  }

  $elements['#attached']['library'][] = 'color_pickr/color_pickr_front';

  return $elements;
}
}