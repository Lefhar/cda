
<?php if(empty($_POST['fichier'])){
// On met les types autorisés dans un tableau (ici pour une image)
    $aMimeTypes = array("image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/x-png", "image/tiff");
// On extrait le type du fichier via l'extension FILE_INFO 
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimetype = finfo_file($finfo, $_FILES["fichier"]["tmp_name"]);
    finfo_close($finfo);
    $info = new SplFileInfo($_FILES["fichier"]["name"]);
    if (in_array($mimetype, $aMimeTypes))
    {
        /* Le type est parmi ceux autorisés, donc OK, on va pouvoir
           déplacer et renommer le fichier */

        move_uploaded_file($_FILES["fichier"]["tmp_name"], "src/img/1.".$info->getExtension());

    }
    else
    {
        // Le type n'est pas autorisé, donc ERREUR


        echo "Type de fichier non autorisé";
        exit;
    }
}