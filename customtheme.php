<?php

require_once 'customtheme.civix.php';

use CRM_Customtheme_ExtensionUtil as E;

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function customtheme_civicrm_config(&$config): void {
  _customtheme_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function customtheme_civicrm_install(): void {
  _customtheme_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function customtheme_civicrm_enable(): void {
  _customtheme_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_coreResourceList().
 */
function customtheme_civicrm_coreResourceList(&$list, $region) {
  $resources = CRM_Core_Resources::singleton();
  // Load parent theme CSS first
  $resources->addStyleFile('riverlea', 'streams/walbrook/css/_variables.css', -10, $region);
  $resources->addStyleFile('riverlea', 'streams/walbrook/css/civicrm.css', -10, $region);

  // Then load your subtheme CSS
  $resources->addStyleFile('com.skvare.customtheme', '/css/civicrm_custom.css', 0, $region);
}