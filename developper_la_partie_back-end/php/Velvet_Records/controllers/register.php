<?php

class register
{
    public function index()
    {
        include(baseDir.'models/usersModel.php');

        $class = new usersModel();
        $user = $class->getUser();
        if (!empty($user)) {
            header('Location: index.php');
        }
        include(baseDir . 'models/headerModel.php');
        $head = new headerModel();
        $header["menu"]= $head->catHead();
        include(baseDir.'models/registerModel.php');

            $class = new registerModel();
            $data = $class->register();

        include(baseDir . 'views/header.php');
        include(baseDir . 'views/register.php');
        include(baseDir . 'views/footer.php');
    }
}