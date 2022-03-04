<?php

class route
{
    /**
     * @brief charge la route par defaut
     * @return void
     */
    public function index()
    {

        include(baseDir . 'include/database.php');
        if (!empty($_GET['page']) && !file_exists(baseDir . 'controllers/' . $_GET['page'] . '.php')) {
            include(baseDir . 'controllers/erreur404.php');
            $erreur404 = new erreur404();
            $erreur404->index();

        } elseif (!empty($_GET['page']) && file_exists(baseDir . 'controllers/' . $_GET['page'] . '.php')) {
            include(baseDir . 'controllers/' . $_GET['page'] . '.php');
            $controller = new $_GET['page']();
            $controller->index();
        } else {
            include(baseDir . 'controllers/home.php');
            $patients = new home();
            $patients->index();

        }
    }
}