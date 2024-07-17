<?php

/**
 * @file
 * Contains \Drupal\color_pickr\Plugin\field\formatter\ColorPickrDefaultFormatter.
 */

namespace Drupal\color_pickr\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Plugin implementation of the 'color_pickr_default' formatter.
 *
 * @FieldFormatter(
 *   id = "color_pickr_default",
 *   label = @Translation("Color Pickr Default"),
 *   field_types = {
 *     "color_pickr_code"
 *   }
 * )
 */
class ColorPickrDefaultFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = array();
    foreach ($items as $delta => $item) {
      // Render output using color_pickr_default theme.
     if(isset($item->color_pickr) && $item->color_pickr != 'none') {
      $source = array(
        '#theme' => 'color_pickr_default',
        '#color_pickr' => $item->color_pickr,
      );
      $elements[$delta] = array('#markup' => \Drupal::service('renderer')->render($source));
    }
  }

  return $elements;
}
}