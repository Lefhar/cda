<?php

class add_scriptModel
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
     * @brief recupére le post d'ajout de disque
     * @return array
     */
    public function post(): array
    {
        $data = array();
        $data['success'] = false;
        unset($_SESSION['error']);

        if (!empty($_POST)) {
            $_SESSION['form_add'] = $_POST;
        }

        if (empty($_POST['title'])
            or empty($_POST['artist'])
            or empty($_POST['year'])
            or empty($_POST['label'])
            or empty($_POST['genre'])
            or empty($_POST['price'])
            or empty($_FILES['disc_picture'])
        ) {
            $_SESSION['error'] = "Veuillez remplir les champs obligatoire *";
        } else {
            // On met les types autorisés dans un tableau (ici pour une image)
            $aMimeTypes = array("image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/x-png", "image/tiff");

            // On extrait le type du fichier via l'extension FILE_INFO
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mimetype = finfo_file($finfo, $_FILES["disc_picture"]["tmp_name"]);

            finfo_close($finfo);

            if (in_array($mimetype, $aMimeTypes)) {
                /* Le type est parmi ceux autorisés, donc OK, on va pouvoir
                   déplacer et renommer le fichier */

                move_uploaded_file($_FILES["disc_picture"]["tmp_name"], "assets/images/" . $_FILES["disc_picture"]["name"]);
                $query = $this->db->prepare('select artist_id from artist where artist_name = ?');
                $query->execute(array($_POST['artist']));
                $row = $query->fetch();
                $stmt = $this->db->prepare("INSERT INTO disc (disc_title, disc_year,disc_picture,disc_label,disc_genre,disc_price,artist_id) VALUES (?,?,?,?,?,?,?)");
                $stmt->execute(array($_POST['title'],
                    $_POST['year'],
                    $_FILES["disc_picture"]["name"],
                    $_POST['label'],
                    $_POST['genre'],
                    $_POST['price'],
                    $row['artist_id']));
                unset($_SESSION['form_add']);
                $data['success'] = true;
                session_regenerate_id();

            } else {
                // Le type n'est pas autorisé, donc ERREUR
                $_SESSION['error'] = "Type de fichier non autorisé";


            }


        }

        return $data;
    }
}