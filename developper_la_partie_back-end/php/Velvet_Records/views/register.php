<div class="container">
    <div class="row p-2">

        <?php if (!empty($data['error'])) { ?>
            <div class="alert alert-danger" role="alert">
                <?= $data['error']; ?>
            </div>
        <?php } ?>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Créer un compte</h5>
                <div class="card-text">
                    <h6>Déjà inscrit ? <a href="index.php?page=login">Se connecter</a></h6>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="name">Votre nom</label>
                            <input type="text" class="form-control"
                                   placeholder="Entrez votre nom" name="name" id="name"
                                   value="<?= (!empty($_SESSION["form"]["name"])) ? $_SESSION["form"]["name"] : ""; ?>"
                                   required>
                            <small id="nameHelp" class="form-text text-muted">entrer votre nom.</small>
                        </div>

                        <div class="form-group">
                            <label for="surname">Prenom</label>
                            <input type="text" class="form-control"
                                   placeholder="Entez votre prenom" name="surname" id="surname"
                                   value="<?= (!empty($_SESSION["form"]["surname"])) ? $_SESSION["form"]["surname"] : ""; ?>"
                                   required>
                            <small id="surnameHelp" class="form-text text-muted">entrer votre prenom.</small>
                        </div>

                        <div class="form-group">
                            <label for="email">Adresse email</label>
                            <input type="email" class="form-control" aria-describedby="emailHelp"
                                   placeholder="Enter email" name="email" id="email"
                                   value="<?= (!empty($_SESSION["form"]["email"])) ? $_SESSION["form"]["email"] : ""; ?>"
                                   required>
                            <small id="emailHelp" class="form-text text-muted">entrer votre adresse email.</small>
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control" id="password" name="password"
                                   placeholder="mot de passe" required>
                            <small id="passwordHelp" class="form-text text-muted">8 caractéres dont une majuscule et un
                                symbole.</small>
                        </div>

                        <div class="form-group">
                            <label for="confirmpassword">Confirmez votre mot de passe</label>
                            <input type="password" class="form-control" id="confirmpassword" name="confirmpassword"
                                   placeholder="Confirmation du mot de passe" required>
                        </div>
                        <div class="form-group pt-2">
                            <button type="submit" class="btn btn-success">Valider</button>
                            <a href="index.php" class="btn btn-dark">Retour</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>