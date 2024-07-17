## Entity Rest Extra

Extra Rest resources to enable access to entities configuration via Rest Resource

The following resources help to get admin information about Drupal to be used by
external implementation i.e Headless Drupal.

This idea was suggested as a patch to Drupal 8 Core more information at
https://www.drupal.org/node/2355291#comment-9241689

### Usage

Enable Rest Resources created by Entity Rest Extra.

Using the REST UI, enable Rest Resources created by Entity Rest Extra, setting the
Authentication and format JSON is recommended.

Configure any necessary permissions around endpoints as well.

### Get Entity bundles

**End Point:** _/entity/{entity_type}/bundles?_format=json_

**Entity:** could be any valid entity type i.e node or comment

#### Sample Output

_/entity/node/bundles?_format=json_

```json
{
  "article": {
    "label": "Article",
    "translatable": false,
    "description": "Use <em>articles</em> for time-sensitive content like news, press releases or blog posts."
  },
  "page": {
    "label": "Basic page",
    "translatable": true,
    "untranslatable_fields.default_translation_affected": false,
    "description": "Use <em>basic pages</em> for your static content, such as an 'About us' page."
  }
}
```

### Get view modes by Entity and Bundle

**End Point:** _/entity/{entity_type}/{bundle}/view_modes?_format=json_

**Entity:** could be any valid entity type i.e node or comment

**Bundle:** could be any valid bundle for entity provided i.e page, article

#### Sample Output

_/entity/node/article/view_modes?_format=json_

```json
{
  "node.article.default": "default",
  "node.article.rss": "rss",
  "node.article.teaser": "teaser"
}
```

### Get fields by Entity and Bundle

**End Point:** _/entity/{entity_type}/{bundle}/fields?_format=json_

**Entity:** could be any valid entity type i.e node or comment

**Bundle:** could be any valid bundle for entity provided i.e page, article

#### Output Sample

_/entity/node/article/fields?_format=json_

```json
{
  "body": {
    "uuid": "24a4ea46-ee54-4f7a-8e49-31e2a145c985",
    "langcode": "en",
    "status": true,
    "dependencies": {
      "config": [
        "field.storage.node.body",
        "node.type.article"
      ],
      "module": [
        "text"
      ]
    },
    "id": "node.article.body",
    "field_name": "body",
    "entity_type": "node",
    "bundle": "article",
    "label": "Body",
    "description": "",
    "required": false,
    "translatable": false,
    "default_value": [],
    "default_value_callback": "",
    "settings": {
      "display_summary": true,
      "required_summary": false
    },
    "field_type": "text_with_summary"
  },
  "comment": {
    "uuid": "095933a9-04d6-4d6a-a77f-00b4d7625b20",
    "langcode": "en",
    "status": true,
    "dependencies": {
      "config": [
        "field.storage.node.comment",
        "node.type.article"
      ],
      "module": [
        "comment"
      ]
    },
    "id": "node.article.comment",
    "field_name": "comment",
    "entity_type": "node",
    "bundle": "article",
    "label": "Comments",
    "description": "",
    "required": false,
    "translatable": false,
    "default_value": [
      {
        "status": 2,
        "cid": 0,
        "last_comment_timestamp": 0,
        "last_comment_name": null,
        "last_comment_uid": 0,
        "comment_count": 0
      }
    ],
    "default_value_callback": "",
    "settings": {
      "default_mode": 1,
      "per_page": 50,
      "anonymous": 0,
      "form_location": true,
      "preview": 1
    },
    "field_type": "comment"
  },
  "field_image": {
    "uuid": "bf1b234d-9a6b-48c5-9946-6a8493907cc2",
    "langcode": "en",
    "status": true,
    "dependencies": {
      "config": [
        "field.storage.node.field_image",
        "node.type.article"
      ],
      "module": [
        "image"
      ]
    },
    "id": "node.article.field_image",
    "field_name": "field_image",
    "entity_type": "node",
    "bundle": "article",
    "label": "Image",
    "description": "",
    "required": false,
    "translatable": false,
    "default_value": [],
    "default_value_callback": "",
    "settings": {
      "handler": "default:file",
      "handler_settings": [],
      "file_directory": "[date:custom:Y]-[date:custom:m]",
      "file_extensions": "png gif jpg jpeg",
      "max_filesize": "",
      "max_resolution": "",
      "min_resolution": "",
      "alt_field": true,
      "alt_field_required": true,
      "title_field": false,
      "title_field_required": false,
      "default_image": {
        "uuid": null,
        "alt": "",
        "title": "",
        "width": null,
        "height": null
      }
    },
    "field_type": "image"
  },
  "field_tags": {
    "uuid": "d8cc4cef-6198-4094-bc1b-0c14b5880262",
    "langcode": "en",
    "status": true,
    "dependencies": {
      "config": [
        "field.storage.node.field_tags",
        "node.type.article",
        "taxonomy.vocabulary.tags"
      ]
    },
    "id": "node.article.field_tags",
    "field_name": "field_tags",
    "entity_type": "node",
    "bundle": "article",
    "label": "Tags",
    "description": "Enter a comma-separated list. For example: Amsterdam, Mexico City, \"Cleveland, Ohio\"",
    "required": false,
    "translatable": false,
    "default_value": [],
    "default_value_callback": "",
    "settings": {
      "handler": "default:taxonomy_term",
      "handler_settings": {
        "target_bundles": {
          "tags": "tags"
        },
        "sort": {
          "field": "_none"
        },
        "auto_create": true
      }
    },
    "field_type": "entity_reference"
  }
}
```
