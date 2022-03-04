<?php

class update_script
{
    /**
     * @brief contrôleur de mise à jour du disque
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
        include(baseDir . 'models/updateModel.php');
        $disk = new updateModel();
        $data = $disk->update();
        if ($data['success']) {
            header('Location: index.php');
        } else {
            header('Location: index.php?page=update_form');
        }
        include(baseDir . 'views/header.php');
        include(baseDir . 'views/update_form.php');
        include(baseDir . 'views/footer.php');
    }
}