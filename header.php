<?php
session_start();
$path = $_SERVER['PHP_SELF'] != '/laSalleDeClasse/index.php'? '../': '';
include_once 'configuration.php';
include_once 'controllers/headerController.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        <link rel="stylesheet" href="../assets/css/style.css" />
        <title>La Salle De Classe</title>
    </head>
    <body>
        <img class="responsive-img" src="../assets/img/banniere3.jpg" id="classroom" />
        <main>
        <?php if (isset($_SESSION['isConnect'])) { ?>
            <nav>
                <div class="nav-wrapper">
                        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                        <ul id="buttonNavbarConnected" class="hide-on-med-and-down">
                            <li><a id="navBtnConnected" class="waves-effect waves-light btn-large z-depth-4" href="<?= $path ?>views/searchActivity.php">Chercher un atelier</a></li>
                            <li><a id="navBtnConnected" class="waves-effect waves-light btn-large z-depth-4" href="<?= $path ?>views/addActivity.php">Proposer un atelier</a></li>
                            <li><a id="navBtnConnected" class="waves-effect waves-light btn-large z-depth-4" href="?action=disconnect">Déconnexion</a></li>
                            <li><a id="navBtnConnected" class="waves-effect waves-light btn-large z-depth-4" href="<?= $path ?>views/profileTeacher.php">Mon profil</a></li>
                        </ul>
                        <ul class="side-nav" id="mobile-demo">
                            <li><a id="navBtnConnected" class="waves-effect waves-light" href="<?= $path ?>views/searchActivity.php">Chercher un atelier</a></li>
                            <li><a id="navBtnConnected" class="waves-effect waves-light" href="<?= $path ?>views/addActivity.php">Proposer un atelier</a></li>
                            <li><a id="navBtnConnected" class="waves-effect waves-light" href="?action=disconnect">Déconnexion</a></li>
                            <li><a id="navBtnConnected" class="waves-effect waves-light" href="<?= $path ?>views/profileTeacher.php">Mon profil</a></li>
                        </ul>
                    </div>
                    <?php } else { ?>
                </nav>
                <nav>
                    <div class="nav-wrapper">
                        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                        <ul id="buttonNavbarNotConnected" class="hide-on-med-and-down">
                            <li><a id="navBtn" class="waves-effect waves-light btn-large z-depth-4" href="<?= $path ?>views/formAddTeacher.php">INSCRIPTION</a></li>
                            <li><a id="navBtn" class="waves-effect waves-light btn-large z-depth-4" href="<?= $path ?>views/connection.php">CONNEXION</a></li>
                        </ul>
                        <ul class="side-nav" id="mobile-demo">
                            <li><a id="navBtn" class="waves-effect waves-light" href="<?= $path ?>views/formAddTeacher.php">INSCRIPTION</a></li>
                            <li><a id="navBtn" class="waves-effect waves-light" href="<?= $path ?>views/connection.php">CONNEXION</a></li>
                        </ul>
                    </div>
                </nav>
            <?php } ?>
          
