<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_churchcal
 *
 * @copyright   Copyright (C) 2018 Ulrich Rueth, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

// Include the churchcal functions only once
JLoader::register('ModChurchcalHelper', __DIR__ . '/helper.php');

// Get mod_churchcal parameters
$module = JModuleHelper::getModule('mod_churchcal');
$params = new JRegistry($module->params);

// Get Calendar events.
// Authorization with API Key
// URL example: 'https://<meine-kirch>.church.tools/api/calendars/appointments?calendar_ids<ids>&from=<yyyy-mm-dd>&to=<yyyy-mm-dd>'

$url = $params['calurl'];
$data = array(
	'func' => 'getCalendarEvents', 
	'calendar_ids' => explode(',', $params['calids']),
	'from' => $params['calfrom'],  
	'to' => $params['calto']);
$calapikey = 'Login ' . $params['calapikey'];
$result = modChurchCalHelper::sendRequest($url, $data, $calapikey);
if ($result->status == "fail") {
  echo $result->data;
  return;
}
	
require JModuleHelper::getLayoutPath('mod_churchcal');
