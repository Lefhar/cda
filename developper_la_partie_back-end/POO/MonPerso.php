<?php
include ('classes/Personnage.php');
$p = new Personnage();
$p->setNom("Lebowski");
$p->setPrenom("Jeff");

var_dump($p);