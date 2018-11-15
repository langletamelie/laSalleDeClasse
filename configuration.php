<?php
// Définition des informations de connexion à la base de données
define('HOST', 'localhost');
define('LOGIN', 'abcd');
define('PASSWORD', '456');
define('DBNAME', 'laSalleDeClasse');

// Ajout des fichiers nécessaire au bon fonctionnement du site
include_once 'models/database.php';
include_once 'models/teachers.php';
include_once 'models/activities.php';
include_once 'models/categories.php';
include_once 'models/comments.php';
include_once 'models/favorites.php';
include_once 'models/picturesProfil.php';
include_once 'models/schoolDegrees.php';

