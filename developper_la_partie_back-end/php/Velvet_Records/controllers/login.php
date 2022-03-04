<?php

class login
{
    /**
     * @throws Exception
     */
    public function index()
    {
        include(baseDir . 'models/headerModel.php');
        $head = new headerModel();
        $header["menu"]= $head->catHead();
        include(baseDir.'models/usersModel.php');

        $class = new usersModel();
        $data = $class->sign();

        $user = $class->getUser();
        if (!empty($user)) {
            header('Location: index.php');
        }
        include(baseDir . 'views/header.php');
        include(baseDir . 'views/login.php');
        include(baseDir . 'views/footer.php');
    }
}