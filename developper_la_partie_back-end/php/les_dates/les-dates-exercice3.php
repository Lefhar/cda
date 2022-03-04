<?php
/**
 * Exercice 3
 *Combien reste-t-il de jours avant la fin de votre formation.
 */
$finformation = new DateTime('2021-07-09');//date de fin
$date = new DateTime();//date actuel
$diff = $finformation->diff($date);// nombre de jour entre les deux dates
echo $diff->days." jours de formation restants";