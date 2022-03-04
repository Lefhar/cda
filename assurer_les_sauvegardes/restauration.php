<?php
include('db.php');//on inclue la base de donnée
$dir    = './';//direction actuel
$dump = "./backup/jarditou-".date('d-m-y-h').".sql";// repertoire et nom du fichier
if(!file_exists('./backup')){// si le dossier existe pas
    mkdir("./backup/", 0755);// on créait le dossier
}
$files1 = scandir($dir);//on scannne dir c'est à dire le dossier où se trouve le script

//Serveur_et_formulaires de réstauration de la base de donnée
echo '<form action="" method="post">
<select id="base"  name="base">';

foreach ($files1 as $files)
{

    if(preg_match('`.sql`',$files)){// on ne recupére que les fichier .sql
        echo '<option value="'.$files.'">'.$files.' '.date("Y-m-d H:i:s", fileatime($files)).'</option>';

    }
}
echo '</select>
 <button type="submit" >Restauration de la base de donnée</button>
 
 </form>';

if(!empty($_POST['base'])){

    if(file_exists($_POST['base'])){//on vérifie que la base séléctionné existe bien
        $baseactuel = $_POST['base'];

    }else{//sinon on affiche l'erreur et on stop par un exit
        echo $_POST['base'].' existe pas ou un problème c\'est produit';
        exit();
    }

    if(!file_exists($dump)){// si le fichier dump existe pas

        //on créer la sauvegarde dans /backup
        system('mysqldump --host='.$host.' --user='.$user.' --password='.$password.' --no-create-db --default-character-set=utf8 --lock-tables=FALSE --tables '.$database.' > '.$dump,$retour);

    }else{

        unlink($dump); //sinon on efface le fichier
        //on créer la sauvegarde dans /backup
        system('mysqldump --host='.$host.' --user='.$user.' --password='.$password.' --no-create-db --default-character-set=utf8 --lock-tables=FALSE --tables '.$database.' > '.$dump,$retour);

    }

    if(file_exists($dump)&&$retour ==0){// si le fichier dump existe et que la commande retourne 0 c'est à dire que la requête c'est bien passé on lance la réstauration

        system('mysql --host='.$host.' --user='.$user.' --password='.$password.' '.$database.' < '.$baseactuel,$retoursql);

        if($retoursql==0){// si la commande c'est bien passé on affiche le message que tout est bon :)

            echo "restauration de la base de donnée reussit en cas d'erreur vous trouverez dans le dossier backup une sauvegarde de la base de donnée";
        }else{

            echo "un erreur c'est produite la réstauration ne c'est pas faite";
        }


    }



}