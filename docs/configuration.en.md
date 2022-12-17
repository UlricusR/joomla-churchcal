# Configuration

## Basic Configuration

The following fields are available in the backend of Joomla! ChurchCal:

- ChurchCal URL: The URL of the ChurchTools Calendar, e.g.: `https://my-domain.de/index.php?q=churchcal/ajax`. It is important to add /ajax at the end of your URL.
- Calendar IDs: The category IDs of the calendars to be displayed as comma separated list without any blanks, e.g.: `1,2,4`. It is important that these calendars are configured for [public access](https://help.church.tools/wiki/0/Embed%20ChurchCal#Publiccalendars){:target="_blank"}, otherwise you couldn't see anything except if you're logged in.
- From day: The day to start displaying events from, e.g. 0 for current day, 7 for in a week, etc.; default: 0
- To day: The day to end displaying events, e.g. 14 for in two weeks, etc.; default: 14
- Max. entries: The maximum number of calendar entries
- Sorting: The sorting order (ascending or descending); default: ascending
- List format: HTML tagging of the list, either as `<p>` elements or as `<li>` elements
- Show weekday: Whether or not to display the weekday (Monday, Tuesday, etc.); default: Yes
- Weekday format: Format of the weekday, either short (Mon, Tue, Wed, etc.) or long (Monday, Tuesday, Wednesday, etc.); default: long
- Weekday separator: The string separating the weekday from the date/time; default: `, ` (comma followed by a blank)
- User specific language: If not given, the language of the Joomla! frontend will be used. If given, the respective language files need to be installed (pre-installed: de-DE and en-GB).
- Date format: The date format according to [PHP date function](https://www.php.net/manual/en/function.date.php){:target="_blank"}; default: j.n.y (e.g. 9.7.18)
- Time format: The time format according to [PHP date function](https://www.php.net/manual/en/function.date.php){:target="_blank"}; default: G:i (e.g. 17:00)
- Start time separator: The string separating the date from the start time; default: `, ` (comma followed by a blank)
- Show end time: Whether or not to display the end time; default: No
- End time separator: The string separating the start time from the end time; default: `-` (minus without blanks)
- Description separator: The string separating the date/time from the description; default: `: ` (colon followed by a blank)
- Line break before description: Adds a line break `<br>` after date/time resp. before the description; default: No

## Advanced Configuration

- Module class suffix: You can enter the `<div>` class name here and use Joomla!'s custom.css to format your calendar entry.
