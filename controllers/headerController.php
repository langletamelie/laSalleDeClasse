<?php

if (isset($_GET['action'])) {
    //Si on veut se déconnecter
    if ($_GET['action'] == 'disconnect') {
        //détruit les variables de la session
        session_unset();
        //destruction de la session
        session_destroy();
        //redirection de la page vers l'index
        header('location:../index.php');
        exit;
    }
}