<?php

class details
{

    /**
     * @brief  controleur de la page details pour un disque
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
        include(baseDir . 'models/detailsModel.php');
        $disk = new detailsModel();
        if (!empty($_GET['id'])) {
            $disk->setId($_GET['id']);
        }
        $data = $disk->index();
        include(baseDir . 'views/header.php');
        include(baseDir . 'views/details.php');
        include(baseDir . 'views/footer.php');
    }
}