<?php

namespace Drupal\views_better_rest\Normalizer;

use Drupal\Core\Url;
use Drupal\serialization\Normalizer\ComplexDataNormalizer;

/**
 * Converts the Drupal entity object structures to a normalized array.
 */
class UrlNormalizer extends ComplexDataNormalizer {

  /**
   * The interface or class that this Normalizer supports.
   *
   * @var string
   */
  protected $supportedInterfaceOrClass = Url::class;

  /**
   * {@inheritdoc}
   */
  public function supportsNormalization($data, $format = NULL, array $context = []): bool {
    $supported = parent::supportsNormalization($data, $format, $context);
    // Double-check the instance of Url
    return $supported && ($data instanceof Url);
  }

  /**
   * {@inheritdoc}
   */
  public function normalize($object, $format = NULL, array $context = []): array|string|int|float|bool|\ArrayObject|NULL {
    return $object instanceof Url ? $object->toString() : NULL;
  }
}
