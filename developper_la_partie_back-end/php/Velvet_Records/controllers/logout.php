<?php

class logout
{
 public  function index(){
     include(baseDir.'models/usersModel.php');

     $class = new usersModel();
     $user = $class->getUser();

     include(baseDir.'models/logoutModel.php');
     $obj = new logoutModel();
     $data = $obj->out();
     if ($data['success']) {
         header('Location: index.php');
     }
     include(baseDir . 'views/header.php');
     include(baseDir . 'views/confirm_logout.php');
     include(baseDir . 'views/footer.php');
 }
}