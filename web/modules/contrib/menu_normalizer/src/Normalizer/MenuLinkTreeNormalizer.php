<?php

namespace Drupal\menu_normalizer\Normalizer;

use Drupal\Core\Menu\MenuLinkTreeElement;
use Drupal\serialization\Normalizer\NormalizerBase;

/**
 * MenuLinkTreeElement normalizer.
 */
class MenuLinkTreeNormalizer extends NormalizerBase {

  /**
   * Supported Interface or Class.
   *
   * @var string
   */
  protected $supportedInterfaceOrClass = MenuLinkTreeElement::class;

  /**
   * {@inheritdoc}
   */
  public function normalize($object, $format = NULL, array $context = []) {
    /** @var \Drupal\Core\Menu\MenuLinkTreeElement $object */
    return [
      'link' => $this->serializer->normalize($object->link, $format, $context),
      'has_children' => $object->hasChildren,
      'depth' => $object->depth,
      'in_active_trail' => $object->inActiveTrail,
      'subtree' => $this->serializer->normalize($object->subtree, $format, $context),
      'count' => $object->count(),
    ];
  }

}
