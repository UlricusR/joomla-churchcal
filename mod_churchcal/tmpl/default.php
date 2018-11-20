<?php 
// No direct access
defined('_JEXEC') or die;

// Define weekdays TODO Localize
$weekdays = array('Sonntag', 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag');

// Decode Object delivered by CT ChurchCal
$caldata = json_decode(json_encode($result->data), true);

// Display calendar items TODO Configure parameters to show
$displayItems = array();
foreach($caldata as $calitem) {
	$sortdate = strtotime($calitem['startdate']);
	$weekday = $weekdays[date('w', $sortdate)];
	$date = explode(' ', $calitem['startdate']);
	$startdate = implode('.', array_reverse(explode('-', $date[0])));
	$time = explode(':', $date[1]);
	$displayItems[] = array("timestamp" => $sortdate, "displayString" => "<p>$weekday, $startdate, $time[0]:$time[1] Uhr: $calitem[bezeichnung]</p>");
}

// Sorting
if ($params['calsorting'] == '0') asort($displayItems);
else arsort($displayItems);

// Display
foreach($displayItems as $displayItem)
	echo $displayItem['displayString'];
