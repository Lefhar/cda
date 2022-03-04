<?php

class logoutModel
{
    /**
     * @brief  fonction de déconnexion supprime la session et le cookie
     * @return array|void
     */
    public function out()
    {
        $data = array();
        $data['success'] = false;
        if (!empty($_POST['confirm'])) {
            if (!empty($_SESSION["login"])) {
                setcookie('login', "", time() - 3200);
                unset($_SESSION['login']);
                session_destroy();
                $data['success'] = true;
            }
            return $data;

        }
    }
}