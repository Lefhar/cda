<?php

class erreur404
{
    /**
     * @brief controleur d'une erreur 404
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
        include(baseDir . 'views/header.php');
        include(baseDir . 'views/erreur404.php');
        include(baseDir . 'views/footer.php');
    }
}