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
	// Create DateTime instance with calitem's start date&time
	// TODO configure DateTimeZone
	$dateTime = new DateTime($calitem['startdate'], new DateTimeZone('Europe/Berlin'));
	
	// Create a timestamp that we'll use for sorting later
	$sortdate = strtotime($calitem['startdate']);
	
	// Create the string representation of the date / time
	$displayString = '<p>';
	if ($params['caldisplayweekday'] == 1) {
		$displayString .= $weekdays[$dateTime->format('w')];
		$displayString .= $params['calweekdayseparator'];
	}
	$displayString .= $dateTime->format($params['caldatetimeformat']);
	
	// Add description
	$displayString .= $params['caldescriptionseparator'];
	$displayString .= $calitem['bezeichnung'];
	
	// Finalize string representation
	$displayString .= '</p>';
	
	// Add display string to array
	$displayItems[] = array('timestamp' => $sortdate, 'displayString' => $displayString);
}

// Sorting
if ($params['calsorting'] == '0') asort($displayItems);
else arsort($displayItems);

// Display
foreach($displayItems as $displayItem)
	echo $displayItem['displayString'];
