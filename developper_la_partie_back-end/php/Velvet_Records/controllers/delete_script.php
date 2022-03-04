<?php

class delete_script
{

    /**
     * controleur de suppréssion d'un disque avec sont image
     * @return void
     */
    public  function index()
    {
        include(baseDir.'models/usersModel.php');

        $class = new usersModel();
        $user = $class->getUser();
        include(baseDir . 'models/headerModel.php');
        $head = new headerModel();
        $header["menu"]= $head->catHead();
        include(baseDir . 'models/deleteModel.php');
        $disk = new deleteModel();
          $data =  $disk->del();
        if($data['success']){
            header('Location: index.php');
        }else{
            header('Location: index.php?page=delete_form&id='.$_POST['disc_id']);
        }
        include(baseDir . 'views/header.php');
        include(baseDir . 'views/confirm_delete.php');
        include(baseDir . 'views/footer.php');
    }
}