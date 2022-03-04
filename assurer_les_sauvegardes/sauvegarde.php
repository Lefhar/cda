<?php
include('db.php');//on inclue la base de donné
$dump = "jarditou-".date('d-m-y-h').".sql";//nom de la base de donnée dans le dossier du script
$dir    = './';// direction en l'occurence où se trouve le script
$files1 = scandir($dir);//fonction php pour scanner le repertoire actuel
$date = new DateTime();
$date->modify('- 4 hour');//on retire 4 heures de l'heure actuel
$datecompare = $date->format('Y-m-d H:i:s');
foreach ($files1 as $files)//boucle qui va afficher les fichiers
{

    if(preg_match('`.sql`',$files)){//on recupére que les fichier qui contient .sql
        echo $files.' '.date("Y-m-d H:i:s", fileatime($files)).'<br>';
        if($datecompare > date("Y-m-d H:i:s", fileatime($files))){
            unlink($files);//on efface par tout les fichiers qui sont agé de plus de 4 heures

        }
    }
}
if(!file_exists($dump)){//si le fichier existe pas on execute la commande pour faire le dump de la base
    system('mysqldump --host='.$host.' --user='.$user.' --password='.$password.' --no-create-db --default-character-set=utf8 --lock-tables=FALSE --tables '.$database.' > '.$dump);
}