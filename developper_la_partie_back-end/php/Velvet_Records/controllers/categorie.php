<?php

/**
 * @brief controleur categorie gére les catégories par artiste id
 */
class categorie
{
    /**
     * @brief fonction index du contrôleur categorie
     * @return void
     */
    public function index()
    {
        include(baseDir.'models/usersModel.php');

        $class = new usersModel();
        $user = $class->getUser();
        include(baseDir . 'models/headerModel.php');
        $head = new headerModel();
        $header["menu"]= $head->catHead();
        include(baseDir . 'models/categorieModel.php');
        $disk = new categorieModel();
        if (!empty($_GET['p'])) {
            $disk->setPage($_GET['p']);
        }
        $disk->setArtist($_GET['id']);
        $data = $disk->index();
        include(baseDir . 'views/header.php');
        include(baseDir . 'views/categorie.php');
        include(baseDir . 'views/footer.php');
    }
}