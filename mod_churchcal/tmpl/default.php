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
	$startdate = new DateTime($calitem['startdate']);
	$enddate = new DateTime($calitem['enddate']);
	
	// Create a timestamp that we'll use for sorting later
	$sortdate = strtotime($calitem['startdate']);
	
	// Create the string representation of the date / time
	$displayString = '<p>';
	if ($params['caldisplayweekday'] == 1) {
		$displayString .= $weekdays[$startdate->format('w')];
		$displayString .= $params['calweekdayseparator'];
	}
	$displayString .= $startdate->format($params['caldateformat']);
	$displayString .= $params['calstarttimeseparator'];
	$displayString .= $startdate->format($params['caltimeformat']);
	if ($params['caldisplayendtime'] == 1) {
		$displayString .= $params['calendtimeseparator'];
		$displayString .= $enddate->format($params['caltimeformat']);
	}
	
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
