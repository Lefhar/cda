<?php
/**
 * Exercice 5
*Quelle sera la prochaine année bissextile ?
 */
$date = new DateTime();
for ($i = 0; $i < 4; $i++)
{
    $date->modify('+1 years');
    if ($date->format('L') == 1)
    {
        ?>
        L'année <?= $date->format('Y') ?> sera la prochaine année bissextile.
        <?php
    }
}
