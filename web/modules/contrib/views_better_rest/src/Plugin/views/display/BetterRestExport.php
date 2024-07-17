<?php

namespace Drupal\views_better_rest\Plugin\views\display;

use Drupal\Core\Render\RenderContext;
use Drupal\Component\Utility\Html;
use Drupal\rest\Plugin\views\display\RestExport;
use Drupal\views\Render\ViewsRenderPipelineMarkup;

/**
 * The plugin that handles Data response callbacks for REST resources.
 *
 * This file copied from rest_export_nested project and integrated
 * with BetterRestSerializer provided in this module.
 *
 * @see https://www.drupal.org/project/rest_export_nested
 *
 * @ingroup views_display_plugins
 *
 * @ViewsDisplay(
 *   id = "better_rest_export",
 *   title = @Translation("Better REST export"),
 *   help = @Translation("Create a better REST export resource."),
 *   uses_route = TRUE,
 *   admin = @Translation("JSONAPI"),
 *   returns_response = TRUE
 * )
 */
class BetterRestExport extends RestExport {

  /**
   * {@inheritdoc}
   */
  public function render() {
    $build = [];
    $build['#markup'] = $this->renderer->executeInRenderContext(new RenderContext(), function() {
      return $this->view->style_plugin->render();
    });

    // Decode results.
    $results = json_decode($build['#markup']);

    // Loop through results and fields.
    foreach ($results->rows as $key => $result) {
      foreach ($result as $property => $value) {
        // Check if the field can be decoded using PHP's json_decode().
        if (is_string($value)) {
          if (json_decode($value) !== NULL) {
            // If so, use Guzzle to decode the JSON and add it to the results.
            $results->rows[$key]->$property = json_decode($value);;
          }
          elseif (json_decode(Html::decodeEntities($value)) !== NULL){
            $results->rows[$key]->$property = json_decode(Html::decodeEntities($value));
          }
        }
        // Special null handling.
        if ($value === 'null') {
          $results->rows[$key]->$property = NULL;
        }
      }
    }

    // Convert back to JSON.
    $build['#markup'] = json_encode($results);

    $this->view->element['#content_type'] = $this->getMimeType();
    $this->view->element['#cache_properties'][] = '#content_type';

    // Encode and wrap the output in a pre tag if this is for a live preview.
    if (!empty($this->view->live_preview)) {
      $build['#prefix'] = '<pre>';
      $build['#plain_text'] = $build['#markup'];
      $build['#suffix'] = '</pre>';
      unset($build['#markup']);
    }
    elseif ($this->view->getRequest()->getFormat($this->view->element['#content_type']) !== 'html') {
      // This display plugin is primarily for returning non-HTML formats.
      // However, we still invoke the renderer to collect cacheability metadata.
      // Because the renderer is designed for HTML rendering, it filters
      // #markup for XSS unless it is already known to be safe, but that filter
      // only works for HTML. Therefore, we mark the contents as safe to bypass
      // the filter. So long as we are returning this in a non-HTML response
      // (checked above), this is safe, because an XSS attack only works when
      // executed by an HTML agent.
      // @todo Decide how to support non-HTML in the render API in
      //   https://www.drupal.org/node/2501313.
      $build['#markup'] = ViewsRenderPipelineMarkup::create($build['#markup']);
    }

    $this->applyDisplayCacheabilityMetadata($build);

    return $build;
  }

}
