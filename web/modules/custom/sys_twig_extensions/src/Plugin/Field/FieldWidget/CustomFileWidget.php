<?php 

namespace Drupal\sys_twig_extensions\Plugin\Field\FieldWidget;

use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Field\FieldItemListInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

/**
 * Plugin implementation of the 'custom_file_widget' widget.
 *
 * @FieldWidget(
 *   id = "custom_file_widget",
 *   label = @Translation("File Upload (Novo)"),
 *   field_types = {
 *     "custom_file"
 *   }
 * )
 */

class CustomFileWidget extends WidgetBase {

  public function getParagraphMedia($pid) {
    $base = \Drupal::request()->getSchemeAndHttpHost();

    $client = \Drupal::httpClient();

    try {
      $request = $client->get($base . '/entity/paragraph/'. $pid);
      $status = $request->getStatusCode();
      $file_contents = $request->getBody()->getContents();

      if(json_decode($file_contents)->field_thumbnail && json_decode($file_contents)->field_thumbnail[0]) {
        return json_decode($file_contents)->field_thumbnail[0]->file_id;
      }
    }
    catch (RequestException $e) {
      //An error happened.
      return $e;
    }    
  }

  public function getMediaUrl($mid) {
    $base = \Drupal::request()->getSchemeAndHttpHost();

    $client = \Drupal::httpClient();

    try {
      $request = $client->get($base . '/api/media/?fid='. $mid);
      $status = $request->getStatusCode();
      $file_contents = $request->getBody()->getContents();

      return json_decode($file_contents);
    }
    catch (RequestException $e) {
      //An error happened.
      return $e;
    }    
  }

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {    
    
    $pid = $items[$delta]->getParent()->getParent()->getEntity()->id();

    if($pid && $this->getParagraphMedia($pid)) {
      $media = $this->getParagraphMedia($pid);
    }

    $element['file_id'] = [
      '#type' => 'managed_file',
      '#title' => $this->t($element['#title']),
      '#upload_location' => 'public://',
      '#default_value' => isset($media) ? [$media] : NULL,
      '#upload_validators' => [
        'file_validate_extensions' => ['jpg png jpeg webp'],
        'file_validate_size' => [2 * 1024 * 1024], // 2 MB
      ],
    ];

    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public function massageFormValues(array $values, array $form, FormStateInterface $form_state) {
      if (isset($values[0]['file_id']) && !empty($values[0]['file_id'])) {
          // Ensure the file ID is handled as an integer.
          $file_id = (int) $values[0]['file_id'][0];

          // Load and handle the file entity.
          $file = \Drupal\file\Entity\File::load($file_id);
          if ($file) {
              $file->setPermanent();
              $file->save();
              // Set the correct structure for saving.
              $values[0]['file_id'] = $file_id;
          } else {
              // Handle the case where the file could not be loaded.
              $values[0]['file_id'] = NULL;
          }
      }
      return $values;
  }
}
