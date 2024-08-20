<?php 

namespace Drupal\sys_twig_extensions\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Defines the 'custom_file' field type.
 *
 * @FieldType(
 *   id = "custom_file",
 *   label = @Translation("File Upload (Novo)"),
 *   description = @Translation("Custom file field type."),
 *   default_widget = "custom_file_widget",
 *   default_formatter = "file_default"
 * )
 */
class CustomFileItem extends FieldItemBase {

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_storage_definition) {
    return [
      'columns' => [
        'file_id' => [
          'type' => 'int',
          'unsigned' => TRUE,
        ],
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_storage_definition) {
    $properties['file_id'] = DataDefinition::create('integer')->setLabel(t('File ID'));

    return $properties;
  }

  /**
   * {@inheritdoc}
   */
  public function isEmpty() {
      $value = $this->get('file_id')->getValue();
      
      return empty($value) || !is_int($value);
  }
}

