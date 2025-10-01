<?php
// This file declares a CSS theme for CiviCRM.

return [
  'name' => 'customtheme',
  'title' => 'customtheme theme',
  'title' => ts('Custom Theme (Walbrook-based)'),
  'prefix' => NULL,
  'url_callback' => '\\Civi\\Core\\Themes\\Resolvers::simple',
  'search_order' => [
    'customtheme',        // Your custom theme first
    'walbrook',          // Then Walbrook as fallback
    '_fallback_',        // Finally default fallback
  ],
  'excludes' => [],
];
