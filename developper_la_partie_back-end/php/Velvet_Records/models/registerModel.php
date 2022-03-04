<?php

/**
 * @brief classe Model qui gére l'inscription
 */
class registerModel
{
    private $db; // déclaration de la variable de connexion


    /**
     * @brief  construction l'objet de la connexion avec l'ordre de se connecté à la bdd par la class Database
     */
    public function __construct()
    {
        $this->db = Database::connect();
    }


    /**
     * @brief fonction d'inscription
     * @return array
     * @throws Exception
     */
    public function register(): array
    {
        unset($_SESSION['form']);
        $data = array();
        $data['success'] = false;
        if (!empty($_POST)) {
            $_SESSION['form'] = $_POST;

            if (!empty($_POST['name'])
                && preg_match("`^[a-zA-Z]{2,}$`", $_POST['name'])
                && !empty($_POST['surname'])
                && preg_match("`^[a-zA-Z]{2,}$`", $_POST['surname'])
                && !empty($_POST['email'])
                && preg_match("`^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,4}$`", $_POST['email'])
                && !empty($_POST['password'])
                && preg_match("`^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,})$`", $_POST['password'])
                && !empty($_POST['confirmpassword'])
                && $_POST['confirmpassword'] == $_POST['password']
            ) {
                $random = random_bytes(12);
                $salt = bin2hex($random);
                $password_hash = password_hash($_POST['password'] . $salt, PASSWORD_DEFAULT);// on appel la fonction password comme sa on reprend la même méthode d'assemblage du sel et du mot de passe
                $date_create = date('Y-m-d H:i:s');
                $user = $this->db->prepare('select * from users where email=?');
                $user->execute(array($_POST['email']));
                $verif = $user->fetch();
                if (!empty($verif['id'])) {
                    $data['error'] = "vous êtres déjà inscrit";
                } else {
                    $insert = $this->db->prepare('insert into users ( nom, prenom, email, password, salt, date_register) values (?,?,?,?,?,?)');
                    $insert->execute(array($_POST['name'], $_POST['surname'], $_POST['email'], $password_hash, $salt, $date_create));
                    $data['success'] = true;
                }

            } else {
                $data['error'] = "Veuillez bien remplir correctement tout les champs";
            }

        }
        return $data;
    }

}