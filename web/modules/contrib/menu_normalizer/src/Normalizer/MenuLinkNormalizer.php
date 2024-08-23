<?php

namespace Drupal\menu_normalizer\Normalizer;

use Drupal\Core\Menu\MenuLinkInterface;
use Drupal\serialization\Normalizer\NormalizerBase;

/**
 * MenuLinkInterface normalizer.
 */
class MenuLinkNormalizer extends NormalizerBase {

  /**
   * Supported Interface or Class.
   *
   * @var string
   */
  protected $supportedInterfaceOrClass = MenuLinkInterface::class;

  /**
   * {@inheritdoc}
   */
  public function normalize($object, $format = NULL, array $context = []) {
    /** @var \Drupal\Core\Menu\MenuLinkInterface $object */
    return [
      'id' => $object->getPluginId(),
      'weight' => $object->getWeight(),
      'title' => $object->getTitle(),
      'description' => $object->getDescription(),
      'menu_name' => $object->getMenuName(),
      'provider' => $object->getProvider(),
      'parent' => $object->getParent(),
      'enabled' => $object->isEnabled(),
      'expanded' => $object->isExpanded(),
      'resettable' => $object->isResettable(),
      'translatable' => $object->isTranslatable(),
      'deletable' => $object->isDeletable(),
      'route_name' => $object->getRouteName(),
      'route_parameters' => $object->getRouteParameters(),
      'url' => $object->getUrlObject()->toString(),
      'options' => $object->getOptions(),
      'meta_data' => $this->serializer->normalize($object->getMetaData(), $format, $context),
      'delete_route' => $object->getDeleteRoute(),
      'edit_route' => $object->getEditRoute(),
    ];
  }

}
