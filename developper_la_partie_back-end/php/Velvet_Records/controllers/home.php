<?php

class home
{
    /**
     * @brief contrôleur par defaut de l'accueil qui contient la liste des disques
     * @return void
     */
    public function index()
    {
        include(baseDir.'models/usersModel.php');

        $class = new usersModel();
        $user = $class->getUser();
        include(baseDir . 'models/headerModel.php');
        $head = new headerModel();
        $header["menu"] = $head->catHead();
        include(baseDir . 'models/homeModel.php');
        $disk = new homeModel();
        if (!empty($_GET['p'])) {
            $disk->setPage($_GET['p']);
        }
        $data = $disk->index();
        include(baseDir . 'views/header.php');
        include(baseDir . 'views/index.php');
        include(baseDir . 'views/footer.php');
    }

}