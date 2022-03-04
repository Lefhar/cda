<?php

/**
 * @param array $array
 * @return float|int
 */
function somme(array $array){
    return array_sum($array);
}
$tab = array(4, 3, 8, 2);
$resultat = somme($tab);
echo $resultat;