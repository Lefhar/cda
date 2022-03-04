<?php
/**
 * Exercice 8
 * Ajoutez 1 mois à la date courante.
 */

$date = new DateTime();
$date->add(new DateInterval('P1M')); //Où 'P1M' indique 'Période de 1 Mois'
echo $date->format('Y-m-d');