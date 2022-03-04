<div class="container">
    <div class="row p-2">
        <div class="alert alert-danger" role="alert">
            <h2>Etres vous sûr de vouloir supprimer ce disque ?</h2>
            <form action="index.php?page=delete_script" method="post">
                <input type="hidden" name="disc_id" value="<?= $_GET['id']; ?>">
                <input type="hidden" name="confirm" value="yes">
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>

    </div>
</div>