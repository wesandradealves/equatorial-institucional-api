<?php 

namespace Drupal\worksafe\Menu;

use Drupal\Core\Entity\EntityTypeManagerInterface;

/**
 * Provides a couple of menu link tree manipulators.
 */
class MymoduleMenuLinkTreeManipulators {

  /**
   * Entity storage.
   *
   * @var \Drupal\Core\Entity\EntityStorageInterface
   */
  protected $menuLinkContentStorage;

  /**
   * Constructs a \Drupal\Core\Menu\DefaultMenuLinkTreeManipulators object.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   */
  public function __construct(EntityTypeManagerInterface $entity_type_manager) {
    $this->menuLinkContentStorage = $entity_type_manager->getStorage('menu_link_content');
  }

  /**
   * Adds field values from the `menu_item_extras` module as properties to menu items.
   *
   * @param \Drupal\Core\Menu\MenuLinkTreeElement[] $tree
   *   The menu link tree to manipulate.
   *
   * @return \Drupal\Core\Menu\MenuLinkTreeElement[]
   *   The manipulated menu link tree.
   */
  public function addMenuContentItemFieldValues(array $tree) {
    foreach ($tree as $key => $element) {
      $plugin_definition = $element->link->getPluginDefinition();
      $id = $plugin_definition['metadata']['entity_id'];
      $menu_link_content = $this->menuLinkContentStorage->load($id);
      $field_icone = $menu_link_content->field_icone->value;

      // This is almost good, but not. We manipulate the menu links in a
      // standard way using a manipulator, BUT RestMenuItemsResource calls
      // MenuLinkTree->build(), and that core method ignores any custom properties
      // we might add to the menu link item.

      // So we tuck this in the spot that is used by RestMenuItemsResource->getMenuItems
      // to build the URL, and we patch that module to look for custom values.

      // The proper solution here is to drop the use of rest_menu_items
      // and use jsonapi.
      $tree[$key]->options['fields'] = ['field_icone' => (($field_icone) ? 1 : 0)];
      if ($tree[$key]->subtree) {
        $tree[$key]->subtree = $this->addMenuContentItemFieldValues($tree[$key]->subtree);
      }
    }
    return $tree;
  }

}