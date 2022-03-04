<div class="container">
    <div class="row p-2">
        <?php if (!empty($data['details'])) {
            ?>
            <h2>Details</h2>
            <div class="col-sm-6">

                <div class="form-group">
                    <label for="title">Title</label>
                    <input class="form-control" type="text" name="title" id="title" disabled
                           value="<?= $data['details']['disc_title']; ?>">
                </div>
                <div class="form-group">
                    <label for="year">Year</label>
                    <input class="form-control" type="text" name="year" id="year" disabled
                           value="<?= $data['details']['disc_year']; ?>">
                </div>
                <div class="form-group">
                    <label for="label">Label</label>
                    <input class="form-control" type="text" name="label" id="label" disabled
                           value="<?= $data['details']['disc_label']; ?>">
                </div>

                <div class="col-sm-6">
                    <label for="title">Picture</label>
                </div>
                <div class="col-sm-6 pb-2">
                    <img id="picture" src="assets/images/<?= $data['details']['disc_picture']; ?>" class="img-fluid"
                         width="300"
                         alt="<?= $data['details']['disc_title']; ?>">
                </div>

                <a href="index.php?page=update_form&id=<?= $data['details']['disc_id']; ?>" class="btn btn-success">Modifier</a>
                <a href="index.php?page=delete_form&id=<?= $data['details']['disc_id']; ?>" class="btn btn-danger">Supprimer</a>
                <a href="index.php?page=index" class="btn btn-primary">Retour</a>

            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="artist">Artist</label>
                    <input class="form-control" type="text" name="artist" id="artist" disabled
                           value="<?= $data['details']['artist_name']; ?>">
                </div>
                <div class="form-group">
                    <label for="genre">Genre</label>
                    <input class="form-control" type="text" name="genre" id="genre" disabled
                           value="<?= $data['details']['disc_genre']; ?>">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input class="form-control" type="text" name="price" id="price" disabled
                           value="<?= $data['details']['disc_price']; ?>">
                </div>
            </div>
        <?php } ?>
    </div>
</div>