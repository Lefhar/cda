<?php

class updateModel
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
     * @brief permet la mise à jour d'un disque avec ou sans nouvelle image
     * @return array
     */
    public function update(): array
    {
        $data = array();
        $data['success'] = false;
        unset($_SESSION['error']);

        if (!empty($_POST)) {
            $_SESSION['form_update'] = $_POST;
        }

        if (!empty($_FILES['disc_picture'])) {
            $aMimeTypes = array("image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/x-png", "image/tiff");
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mimetype = finfo_file($finfo, $_FILES["disc_picture"]["tmp_name"]);
            if (in_array($mimetype, $aMimeTypes)) {
                /**
                 * Le type est parmi ceux autorisés, donc OK, on va pouvoir
                 * déplacer et renommer le fichier
                 */

                move_uploaded_file($_FILES["disc_picture"]["tmp_name"], "assets/images/" . $_FILES["disc_picture"]["name"]);


                $query = $this->db->prepare('select disc_picture from disc where disc_id = ?');
                $query->execute(array($_POST['disc_id']));
                $rowPicture = $query->fetch();

                /**
                 * nouveau fichier du coup on supprime l'ancien fichier
                 */
                if (file_exists("assets/images/" . $rowPicture['disc_picture'])) {
                    unlink("assets/images/" . $rowPicture['disc_picture']);
                }

                /**
                 * mise à jour du disques avec nouvelle image
                 */

                $update = $this->db->prepare('update disc set disc_title=?, disc_year=?,
                disc_picture=?, disc_label=?, disc_price=?, artist_id=? where disc_id=?');
                $update->execute(array($_POST['title'], $_POST['year'], $_FILES["disc_picture"]["name"], $_POST['label'], $_POST['price'], $_POST['artist_id'], $_POST['disc_id']));
                unset($_SESSION['form_add']);
                $data['success'] = true;
                session_regenerate_id();


            } else {
                /**
                 * Le type n'est pas autorisé, donc ERREUR
                 */
                $_SESSION['error'] = "Type de fichier non autorisé";


            }


        } else {
            /**
             * mise à jour du disques sans nouvelle image
             */
            $update = $this->db->prepare('update disc set disc_title=?, disc_year=?, disc_label=?,
                disc_price=?, artist_id=? where disc_id=?');
            $update->execute(array($_POST['title'], $_POST['year'], $_POST['label'], $_POST['price'], $_POST['artist_id'], $_POST['disc_id']));
            $data['success'] = true;
            session_regenerate_id();

        }
        return $data;
    }
}