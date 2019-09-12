<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_churchcal
 *
 * @copyright   Copyright (C) 2018 Ulrich Rueth. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

// Imports
use Joomla\CMS\Helper\ModuleHelper;
use Joomla\Registry\Registry;

// Include the churchcal functions only once
JLoader::register('ModChurchcalHelper', __DIR__ . '/helper.php');

// Get mod_churchcal parameters
$module = ModuleHelper::getModule('mod_churchcal');
$params = new Registry($module->params);

// Get Calendar events. Make sure the calendar is available for public user, TODO otherwise login before
// URL example: 'https://ct-erlangen.feg.de/index.php?q=churchcal/ajax'
$url = $params['calurl'];
$data = array(
	'func' => 'getCalendarEvents', 
	'category_ids' => explode(',', $params['calids']),
	'from' => $params['calfrom'],  
	'to' => $params['calto']);
$result = modChurchCalHelper::sendRequest($url, $data);
if ($result->status == "fail") {
  echo $result->data;
  return;
}
	
require ModuleHelper::getLayoutPath('mod_churchcal');
