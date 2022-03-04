<?php

class delete_form
{
    /**
     * @brief controleur de la confirmation de suppréssion d'un disque
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
        include(baseDir . 'views/confirm_delete.php');
        include(baseDir . 'views/footer.php');
    }

}