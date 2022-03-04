<?php

class add_form
{
    /**
     * @brief controleur qui charge le formulaire d'ajout d'un disque
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
        include(baseDir . 'models/add_formModel.php');
        $disk = new add_formModel();
        $data = $disk->index();
        include(baseDir . 'views/header.php');
        include(baseDir . 'views/add_form.php');
        include(baseDir . 'views/footer.php');
    }
}