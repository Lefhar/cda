<div class="container">
    <div class="row p-2">
        <?php if (!empty($data['disk'])) { ?>

            <?php if (!empty($data['error'])) {
                echo '<div class="alert alert-danger" role="alert">' . $data['error'] . '</div>';
            } ?>
            <h1>Liste des disques (<?=count($data['disk']);?>)</h1>
            <?php foreach ($data['disk'] as $row) { ?>
                <div class="col-sm-6 pb-2">



                    <div class="card flex-row flex-wrap p-2">
                        <div class="card-header border-0">
                            <img src="assets/images/<?=$row['disc_picture'];?>" class="img-fluid" width="300" alt="<?=$row['disc_title'];?>">
                        </div>
                        <div class="card-block px-2">
                            <h4 class="card-title"><?=$row['disc_title'];?> </h4>
                            <p class="card-text"><strong><?=$row['artist_name'];?></strong></p>
                            <p class="card-text"><strong>Label :</strong> <?=$row['disc_label'];?></p>
                            <p class="card-text"><strong>Year :</strong> <?=$row['disc_year'];?></p>
                            <p class="card-text"><strong>Genre :</strong> <?=$row['disc_genre'];?></p>
                            <p class="card-text"><a href="index.php?page=details&id=<?=$row['disc_id'];?>" class="btn btn-primary">Détails</a> </p>

                        </div>
                    </div>


                </div>
            <?php }
            ?>


            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <?php
                    for ($i = 1; $i <= $data['countpage']; $i++) //On fait notre boucle
                    {
                        //On va faire notre condition
                        if ($i == $data['pageActuelle']) //S'il s'agit de la page actuelle...
                        {
                            ?>
                            <li class="page-item disabled"><a class="page-link" href="#"><?= $i; ?></a></li>
                            <?php
                        } else //Sinon...
                        {
                            ?>

                            <li class="page-item"><a class="page-link"
                                                     href="index.php?page=categorie&p=<?= $i; ?>"><?= $i; ?></a>
                            </li>

                        <?php }
                    }
                    ?>
                </ul>
            </nav>
        <?php } else { ?>
            <div class="alert alert-warning text-center" role="alert">
                <h2>Aucun disque à vendre passe au numérique</h2>
                <img  alt="aucun disque"  class="img-fluid" src="assets/images/aucun_disque.jpg" >
            </div>
        <?php } ?>
    </div>
</div>