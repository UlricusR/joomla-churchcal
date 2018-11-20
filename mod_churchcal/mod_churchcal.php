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

// Get Calendar events. Make sure the calendar is available for public user, TODO otherwise login before
// TODO Configure http address, from and to
// Request für nächste Termine https://ct-erlangen.feg.de/?q=churchcal&viewname=eventView&category_id=1,2,4&category_select=1,2,4&minical=true&entries=20&embedded=true
$url = 'https://ct-erlangen.feg.de/index.php?q=churchcal/ajax';
$data = array('func' => 'getCalendarEvents', 
			  'category_ids' => [1,2,4],
              'from' => 0,  
              'to' => '14'); 
$result = modChurchCalHelper::sendRequest($url, $data);
if ($result->status == "fail") {
  echo $result->data;
  return;
}
	
require JModuleHelper::getLayoutPath('mod_churchcal');
