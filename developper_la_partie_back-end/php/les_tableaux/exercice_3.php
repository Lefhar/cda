<?php
$departements = array(
    "Hauts-de-france" => array("Aisne", "Nord", "Oise", "Pas-de-Calais", "Somme"),
    "Bretagne" => array("Côtes d'Armor", "Finistère", "Ille-et-Vilaine", "Morbihan"),
    "Grand-Est" => array("Ardennes", "Aube", "Marne", "Haute-Marne", "Meurthe-et-Moselle", "Meuse", "Moselle", "Bas-Rhin", "Haut-Rhin", "Vosges"),
    "Normandie" => array("Calvados", "Eure", "Manche", "Orne", "Seine-Maritime")
);
$regionorderasc = $departements;
ksort($regionorderasc);

echo '1 Affichez la liste des régions (par ordre alphabétique) suivie du nom des départements<br>';
var_dump($regionorderasc);
echo '2 Affichez la liste des régions suivie du nombre de départements<br>';
foreach ($departements as $key =>$row){

    echo  $key.' '.count($row).'<br>';
}