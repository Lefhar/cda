<?php
$fichier = file('liens.txt');
foreach ($fichier as $row){
    echo '<a href="'.$row.'">Lien '.$row.'</a> <br>';
}
