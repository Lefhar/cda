<div class="container">
    <div class="row p-2">
        <?php if (!empty($_SESSION['error'])) { ?>
            <div class="alert alert-danger" role="alert">
                <?= $_SESSION['error']; ?>
            </div>
        <?php } ?>
        <h2>Ajout d'un vinyle</h2>
        <form action="index.php?page=add_script" method="post"  enctype="multipart/form-data">

            <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" type="text" name="title" id="title"
                       value="<?php if (!empty($_SESSION['form_add']['title'])) {
                           echo $_SESSION['form_add']['title'];
                       } ?>" placeholder="Enter title">
            </div>


            <div class="form-group">
                <label for="artist">Artist</label>
                <select class="form-control" name="artist" id="artist">
                    <?php if (!empty($_SESSION['form_add']['artist']) ) {
                    ?>
                    <option value="<?= $_SESSION['form_add']['artist']; ?>"><?= $_SESSION['form_add']['artist']; ?></option>
                    <?php
                        }

                       if(!empty($data)){ foreach ($data as $row) {
                        if (!empty($_SESSION['form_add']['artist']) && $_SESSION['form_add']['artist'] != $row['artist_name']) {
                            ?>
                        <option value="<?= $row['artist_name']; ?>"><?= $row['artist_name']; ?></option>
                            <?php }elseif(empty($_SESSION['form_add']['artist'])) {
                            ?>
                            <option value="<?= $row['artist_name']; ?>"><?= $row['artist_name']; ?></option>
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
                       value="<?php if (!empty($_SESSION['form_add']['year'])) {
                           echo $_SESSION['form_add']['year'];
                       } ?>" placeholder="Enter year">
            </div>
            <div class="form-group">
                <label for="label">Label</label>
                <input class="form-control" type="text" name="label" id="label"
                       value="<?php if (!empty($_SESSION['form_add']['label'])) {
                           echo $_SESSION['form_add']['label'];
                       } ?>" placeholder="Enter label">
            </div>


            <div class="form-group">
                <label for="genre">Gender</label>
                <input class="form-control" type="text" name="genre" id="genre"
                       value="<?php if (!empty($_SESSION['form_add']['genre'])) {
                           echo $_SESSION['form_add']['genre'];
                       } ?>" placeholder="Enter gender">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input class="form-control" type="text" name="price" id="price"
                       value="<?php if (!empty($_SESSION['form_add']['price'])) {
                           echo $_SESSION['form_add']['price'];
                       } ?>" placeholder="Enter price"  pattern="[0-9]+(\\.[0-9][0-9]?)?">
            </div>

            <div class="form-group pb-2">
                <label for="title">Picture</label>
                <input class="form-control" type="file" name="disc_picture" id="disc_picture" accept="image/*">
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-success">Ajouter</button>
                <a href="index.php" class="btn btn-dark">Retour</a>
            </div>

        </form>
    </div>
</div>