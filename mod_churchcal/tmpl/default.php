<?php 
// No direct access
defined('_JEXEC') or die;

// Define weekdays TODO Localize
$weekdays = array('Sonntag', 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag');

// Decode Object delivered by CT ChurchCal
$caldata = json_decode(json_encode($result->data), true);

// Display calendar items TODO Configure parameters to show
foreach($caldata as $calitem) {
	$weekday = $weekdays[date('w', strtotime($calitem['startdate']))];
	$date = explode(' ', $calitem['startdate']);
	$startdate = implode('.', array_reverse(explode('-', $date[0])));
	$time = explode(':', $date[1]);
	echo "<p>$weekday, $startdate, $time[0]:$time[1] Uhr: $calitem[bezeichnung]</p>";
}
