<?php
/**
 * Exercice 1
 * Affichez la date du jour au format mardi 2 juillet 2019.
 **/
date_default_timezone_set("Europe/Paris");
setlocale(LC_TIME, 'fr.UTF-8', "French");
$cal = IntlCalendar::fromDateTime("now Europe/Paris");
echo IntlDateFormatter::formatObject($cal, array(
    IntlDateFormatter::FULL,
    IntlDateFormatter::NONE));




echo strftime("%A %d %B %Y.");

$date = new DateTime();
$maintenant = strtotime($date->format('Y-m-d'));
echo strftime("%A %e %B %Y", $maintenant);


