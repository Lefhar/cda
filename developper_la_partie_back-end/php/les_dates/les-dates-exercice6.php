<?php
/**
 * Exercice 6
*Montrez que la date du 17/17/2019 est erronée.
 */
$dateTime = DateTime::createFromFormat('d/m/Y','17/17/2019');

$errors = DateTime::getLastErrors();

if (!empty($errors['warning_count']))
{
  echo "la date du 17/17/2019 est erronée";
}