<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Velvet record</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" href="favicon.ico"/>
</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Velvet record</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDarkDropdown"
                    aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                <ul class="navbar-nav  mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="index.php?page=home">
                            Accueil </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="index.php?page=add_form">
                            Ajouter un disques </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Artistes
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php if(!empty($header["menu"])){
                                foreach ($header["menu"] as $art): ?>

                            <li><a class="dropdown-item"class="dropdown-item" href="index.php?page=categorie&id=<?= $art['artist_id'] ?>">
                                    <?= $art['artist_name'] ?>
                                </a></li>
                            <?php
                            endforeach;
                            } ?>
                        </ul>

                    </li>
 <?php if(!empty($user['email'])) {?>



                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbaruserDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Bonjour <?=$user['nom'];?><?=$user['prenom'];?>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbaruserDropdown">

                                            <li><a class="dropdown-item"class="dropdown-item" href="index.php?page=logout">
                                                Deconnexion
                                                </a></li>

                                </ul>

                            </li>


<?php }else{?>
                    <li class="nav-item ">
                        <a class="nav-link" href="index.php?page=register">
                            Espace client </a>
                    </li>
 <?php }?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="d-none d-sm-block">
        <a href="index.php">
            <img class="img-fluid ban" alt="banniere velvet record" src="assets/images/banniere2.jpg" width="100%">
        </a>
    </div>
</header>
</html>
<body>