<?php

class update_form
{

    /**
     * @brief controleur de la page de modification d'un disque
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
        include(baseDir . 'models/update_formModel.php');
        $disk = new update_formModel();
        if (!empty($_GET['id'])) {
            $disk->setId($_GET['id']);
        }
        $data = $disk->index();
        include(baseDir . 'views/header.php');
        include(baseDir . 'views/update_form.php');
        include(baseDir . 'views/footer.php');
    }

}