<?php

/**
 * @file
 * Contains \Drupal\color_pickr\Plugin\Field\FieldWidget\ColorPickrDefaultWidget.
 */

namespace Drupal\color_pickr\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'color_pickr_default' widget.
 *
 * @FieldWidget(
 *   id = "color_pickr_default",
 *   label = @Translation("Color Pickr Default"),
 *   field_types = {
 *     "color_pickr_code"
 *   }
 * )
 */
class ColorPickrDefaultWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return array(
      'theme' => "classic",
      'hide_description' => false,
    ) + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $elements = parent::settingsForm($form, $form_state);

    $elements['theme'] = array(
      '#type' => 'select',
      '#title' => t('Theme'),
      '#default_value' => $this->getSetting('theme'),
      '#options' => array(
        'classic' => $this->t('Classic'),
        'monolith' => $this->t('Monolith'),
        'nano' => $this->t('Nano')
      ),
      '#description' => t('The input theme used for this field.'),
    );

    // Hide Description textbox on edit page.
    $elements['hide_description'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Hide Description Field'),
      '#description' => $this->t('Check this box to hide the description field.'),
      '#default_value' => $this->getSetting('hide_description'),
    ];
    return $elements;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = array();
    $summary[] = t('Theme: @theme', array('@theme' => $this->getSetting('theme')));
    $summary[] = t('Hide Description Textbox : @hide_description',
      array('@hide_description' => $this->getSetting('hide_description') == 1 ?
      'Yes' : "No"));
    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {

    $theme = $this->getSetting('theme');
    $uuid = \Drupal::service('uuid')->generate();
    $element['color_pickr'] = array(
      '#title' => $this->t('Description'),
      '#type' => 'textfield',
      '#default_value' => isset($items[$delta]->color_pickr) ? $items[$delta]->color_pickr : NULL,
      '#attached' => [
        'library' => ['color_pickr/color_pickr'],
        'drupalSettings' => array(
          'uuid' => $uuid,
          'theme' => $theme,
        )
      ],
      '#suffix' => '<div class="color-picker" data-id='.$uuid.'></div>',
      '#attributes' => array(
        'class' => array('color-picker-'.$uuid, 'color-picker-field'),
        'readonly' => true,
        'style' => $this->getSetting('hide_description') == TRUE ? 'display:none' : 'display:block',
      ),
    );
    return $element;
  }
}
