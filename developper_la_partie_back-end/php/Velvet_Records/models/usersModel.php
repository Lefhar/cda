<?php

class usersModel
{
    private $db; // déclaration de la variable de connexion
    public $_user;

    /**
     * @brief  construction l'objet de la connexion avec l'ordre de se connecté à la bdd par la class Database
     */
    public function __construct()
    {
        $this->db = Database::connect();

        if (!empty($_COOKIE['login'])) {


                $_SESSION['login'] = $_COOKIE['login'];

        }

    }




    /**
     * @return array
     */
    public function getUser() :array
    {
        $this->_user = array();
        if(!empty($_SESSION['login'])){
            $user = $this->db->prepare('select * from users where hash_connect=? ');
            $user->execute(array($_SESSION['login']));
            $this->_user = $user->fetch();

        }
        return $this->_user;

    }

    /**
     * @brief fonction pour la connexion utilisateur
     * @return array sortie d'une erreur ou success pour si tout c'est bien passé
     * @throws Exception
     */


    public function sign(): array
    {
        unset($_SESSION['form']);
        $data = array();
        $data['success'] = false;
        if (!empty($_POST)) {
            $_SESSION['form'] = $_POST;

            if (preg_match("`^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,4}$`", $_POST['email'])
                && !empty($_POST['password'])
                && preg_match("`^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,})$`", $_POST['password'])
            ) {

                $date_create = date('Y-m-d H:i:s');
                $user = $this->db->prepare('select * from users where email=? ');
                $user->execute(array($_POST['email']));
                $verif = $user->fetch();
                $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);// on appel la fonction password comme sa on reprend la même méthode d'assemblage du sel et du mot de passe


                /**
                 * verification avec password_verify si le hash du mot de passe correspond au hash
                 */
                if (password_verify($_POST['password'], $password_hash)) {
                    $random = random_bytes(12);
                    $hash_connect = bin2hex($random);
                    $_SESSION['login'] = $hash_connect;
                    $update = $this->db->prepare('update users set date_connect=?, hash_connect=? where id=?');
                    $update->execute(array($date_create, $hash_connect, $verif['id']));
                    if (!empty($_POST['remember']) && $_POST['remember'] == "on") {
                        setcookie('login', $hash_connect, time() + 3200);
                    }
                    $data['success'] = true;

                } else {
                    $_SESSION['error'] = "Mot de passe ou identifiant incorrect";
                }


            } else {
                $data['error'] = "Veuillez bien remplir correctement tout les champs";
            }

        }
        return $data;
    }

}