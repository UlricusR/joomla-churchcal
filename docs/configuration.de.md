# Konfiguration

## Grundkonfiguration

Die folgenden Felder sind im Backend von Joomla! ChurchCal verfügbar:

- Kalender-URL: Die URL des ChurchTool-Kalenders, z.B.: `https://my-domain.de/index.php?q=churchcal/ajax`. Bitte darauf achten, /ajax am Ende der URL anzuhängen.
- Kalendar-IDs: Die Kalender-IDs der darzustellenden Kalender als kommaseparierte Liste ohne Leerzeichen, z.B.: `1,2,4`. Es ist wichtig, dass die Kalender in ChurchTools für [öffentlichen Zugang](https://hilfe.church.tools/wiki/0/Kalender%20einbetten#OumlffentlicheKalender){:target="_blank"} konfiguriert sind, sonst wird nichts angezeigt.
- Ab Tag: Der Tag, ab dem die Kalendereinträge angezeigt werden sollen, z.B. 0 für ab heute, 7 für ab in einer Woche, etc.; Voreinstellung: 0
- Bis Tag: Der Tag, bis zu dem die Kalendereinträge angezeigt werden sollen, z.B. 7 für bis in einer Woche, 14 für bis in zwei Wochen, etc.; Voreinstellung: 14
- Max. Einträge: Die maximale Anzahl an Kalendereinträgen
- Sortierung: Die Sortierung der Kalendereinträge (aufsteigend oder absteigend); Voreinstellung: Aufsteigend
- Listenformat: HTML-Ausgabe der Liste entweder als `<p>`-Elemente oder als `<li>`-Elemente
- Wochentag darstellen: Darstellung des Wochentags (Montag, Dienstag, usw.); Voreinstellung: Ja
- Format Wochentag: Format des Wochentags, entweder kurz (Mo, Di, Mi, etc.) oder lang (Montag, Dienstag, Mittwoch, etc.); Voreinstellung: lang
- Wochentag-Trenner: Die Zeichenkette zur Trennung von Wochentag und Datum; Voreinstellung: `, ` (Komma gefolgt von einem Leerzeichen)
- Benutzerspezifische Sprache: Wenn nicht angegeben, wird die Joomla!-seitig eingestellte Frontend-Sprache benutzt. Wenn angegeben, müssen die Sprachdateien installiert sein (vorinstalliert: de-DE und en-GB).
- Datumsformat: Das Format des Datums entsprechend [PHP date Funktion](http://php.net/manual/de/function.date.php){:target="_blank"}; Voreinstellung: j.n.y (z.B. 9.7.18)
- Zeitformat: Das Format der Zeit entsprechend [PHP date Funktion](http://php.net/manual/de/function.date.php){:target="_blank"}; Voreinstellung: G:i (z.B. 17:00)
- Startzeit-Trenner: Die Zeichenkette zur Trennung von Datum und Startzeit; Voreinstellung: `, ` (Komma gefolgt von einem Leerzeichen)
- Endzeit darstellen: Darstellung der Endzeit; Voreinstellung: Nein
- Endzeit-Trenner: Die Zeichenkette zur Trennung von Start- und Endzeit; Voreinstellung: `-` (Minuszeichen ohne Leerzeichen)
- Beschreibungs-Trenner: Die Zeichenkette zur Trennung von Datum/Zeit und Beschreibung; Voreinstellung: `: ` (Doppelpunkt gefolgt von einem Leerzeichen)
- Zeilenumbruch vor Beschreibung: Fügt einen Zeilenumbruch `<br>` nach Datum/Zeit bzw. vor der Beschreibung hinzu; Voreinstellung: Nein

## Erweiterte Konfiguration

- Modulklassensuffix: Definieren Sie den `<div>` Klassennamen hier und nutzen Sie die custom.css Datei von Joomla!, um Ihre Kalendereinträge zu formatieren.
