<?php

namespace Drupal\suggestion\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\suggestion\SuggestionHelper as Helper;
use Drupal\suggestion\SuggestionStorage as Storage;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Suggestion menu callback.
 */
class SuggestionController extends ControllerBase {

  /**
   * AJAX search autocomplete callback.
   *
   * @param Symfony\Component\HttpFoundation\Request $request
   *   The Request object.
   *
   * @return object
   *   A JSON response of search suggestions.
   */
  public function autoComplete(Request $request) {
    $cfg = Helper::getConfig();
    $json = [];
    $txt = preg_replace(['/^[^a-z]+/', '/[^a-z]+$/'], ['', ' '], strtolower($request->query->get('q')));

    if (strlen($txt) < $cfg->min) {
      return new JsonResponse([]);
    }
    $count = str_word_count($txt);
    $atoms = ($count < $cfg->atoms_min) ? $cfg->atoms_min + 2 : $count + 2;

    $ngram = Storage::like($txt) . '%';

    $suggestions = Storage::getAutocomplete($ngram, $atoms, $cfg->limit);

    if (count($suggestions) < $cfg->limit) {
      $suggestions += Storage::getAutocomplete('%' . $ngram, $atoms, ($cfg->limit - count($suggestions)));
    }
    foreach ($suggestions as $suggestion) {
      $json[] = [
        'value' => $suggestion,
        'label' => $suggestion,
      ];
    }
    return new JsonResponse($json);
  }

}
