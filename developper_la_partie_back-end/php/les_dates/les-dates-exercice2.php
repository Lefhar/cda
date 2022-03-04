<?php
/**
 * Exercice 2
Trouvez le numéro de semaine de la date suivante : 14/07/2019.
 */

$date = new DateTime("2019-07-14");
echo  $date->format("W");