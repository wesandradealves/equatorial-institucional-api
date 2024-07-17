# Drupal views better REST export

This module provides a new REST export display for views, which allows return JSON from view in a more flexible way.

It implements the following features:
* Allow to define a custom JSON structure for the view by adding fields to the display abd overriding their names.
* Allow to use exposed filters with providing possible options for them.
* Allow to use exposed pager with changing number of items per page.
* Allow to use exposed sorts.
* Add URL serializer support.

Module was based on following discussion https://www.drupal.org/project/drupal/issues/2982729#comment-13599784

## Usage

Create views, add display called "Better REST Export" and select to show fields in style.

Set path, like `api/v1/my-view`.

Just add fields to the display and override their names to define custom JSON structure.

Feel free to add exposed filters, sorts and pager to the display.
