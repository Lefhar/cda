<div class="container">
    <div class="row p-2">

        <?php


        if (!empty($data['error'])) { ?>
            <div class="alert alert-danger" role="alert">
                <?= $data['error']; ?>
            </div>
        <?php } ?>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Se connecter</h5>
                <h6>Pas encore inscrit ? <a href="index.php?page=register">S'inscrire</a> </h6>
                <div class="card-text">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="email">Adresse email</label>
                            <input type="email" class="form-control" aria-describedby="emailHelp"
                                   placeholder="Enter email" name="email" id="email">
                            <small id="emailHelp" class="form-text text-muted">entrer votre adresse email.</small>
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control" id="password" name="password"
                                   placeholder="Password">
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember" >
                            <label class="form-check-label" for="remember">Se souvenir de moi</label>
                        </div>
                        <button type="submit" class="btn btn-success">Se connecter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>