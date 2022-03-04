<div class="container">
    <div class="row p-2">
        <?php if (!empty($data['details'])) {
            ?>
            <h2>Modification de <?= $data['details']['disc_title']; ?></h2>
            <form action="index.php?page=update_script" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="title">Title</label>
                    <input class="form-control" type="text" name="title" id="title"
                           value="<?= $data['details']['disc_title']; ?>">
                </div>


                <div class="form-group">
                    <label for="artist_id">Artist</label>
                    <select class="form-control" name="artist_id" id="artist_id">
                        <option value="<?= $data['details']['artist_id']; ?>"><?= $data['details']['artist_name']; ?></option>
                        <?php

                        if (!empty($data['artist'])) {
                            foreach ($data['artist'] as $row) {
                                if ($data['details']['artist_name'] != $row['artist_name']) {
                                    ?>
                                    <option value="<?= $row['artist_id']; ?>"><?= $row['artist_name']; ?></option>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="year">Year</label>
                    <input class="form-control" type="text" name="year" id="year"
                           value="<?= $data['details']['disc_year']; ?>">
                </div>
                <div class="form-group">
                    <label for="label">Label</label>
                    <input class="form-control" type="text" name="label" id="label"
                           value="<?= $data['details']['disc_label']; ?>">
                </div>


                <div class="form-group">
                    <label for="genre">Genre</label>
                    <input class="form-control" type="text" name="genre" id="genre"
                           value="<?= $data['details']['disc_genre']; ?>">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input class="form-control" type="text" name="price" id="price"
                           value="<?= $data['details']['disc_price']; ?>">
                </div>

                <div class="form-group pb-2">
                    <label for="title">Picture</label>
                    <input class="form-control" type="file" name="disc_picture" id="disc_picture" accept="image/*">
                </div>

                <img id="picture" src="assets/images/<?= $data['details']['disc_picture']; ?>" class="img-fluid"
                     width="300"
                     alt="<?= $data['details']['disc_title']; ?>">

                <div class="form-group pt-2">
                    <input type="hidden" name="disc_id" id="disc_id" value="<?= $data['details']['disc_id']; ?>">
                    <button type="submit" class="btn btn-success">Valider</button>
                    <button type="reset" class="btn btn-danger">Annuler</button>
                </div>

            </form>
        <?php } ?>
    </div>
</div>