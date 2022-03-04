<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 3 Ecrire un script qui affiche la table de multiplication totale de {1,...,12} par {1,...,12}, le résultat doit être le suivant :</title>
    <style> table, tr, td, th
        {
            border: 1px solid #000000;
        }
    </style>
</head>
<body>
<?php
//multiplication jusqu'a 12 du coup m = 12
$multiple = 12;
//tableau
echo "<table><tr><th></th>";
//on commence à partir de zero
$i = 0;
while ($i<=$multiple){
    echo "<th>".$i."</th>";
    $i++;
}
echo "</tr>";
//seconde boucle part de 0
$x = 0;
while($x<=$multiple){
    echo "<tr>"; //a chaque boucle j'ouvre une ligne
    echo "<th>".$x."</th>"; //j'affiche la valeur dans la première case
    //on multiplie de 0 à 12
    $y = 0;
    while($y<=$multiple){
        echo "<td>".($x*$y)."</td>";
        $y++;
    }
    echo "</tr>";
    $x++;
}

echo 'corrigé <br>';
echo "<table>\n";

// La 1ère ligne est une ligne d'entête, donc avec <thead>
echo"<thead>\n";
echo"<tr>\n";
// La 1ère cellule est vide
echo"<th> </th>\n";

// Puis on peut créer 12 autres cellules
for ($th=0; $th<=12; $th++)
{
    echo"<th>".$th."</th>\n";
}

// On ferme la ligne
echo"</tr>\n";

// On ferme le <thead
echo"</thead>\n";

// Puis on a besoin de 13 lignes de 13 cellules chacune
for ($ligne=0; $ligne<13; $ligne++)
{
    echo"<tr>\n";

    // Pour toutes les autres lignes, la 1ère cellule est un <th>
    // echo"<thead>\n";
    echo"<th>".$ligne."</th>\n";
    //  echo"</thead>\n";

    // Puis les 12 autres cellules sont des <td>
    for ($td=0; $td<=12; $td++)
    {
        $resultat = $ligne*$td;
        echo "<td>".$resultat."</td>\n";
    }

    // Dans tous les cas, on ferme la ligne
    echo"</tr>\n";
}

echo"</table>\n";
?>
</body>
</html>