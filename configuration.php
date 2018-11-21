<?php
// Définition des constantes permettant la connexion à la base de données
define('HOST', 'localhost');
define('LOGIN', 'abcd');
define('PORT', '3306');
define('PASSWORD', '456');
define('CHARSET', 'utf8');
define('DBNAME', 'laSalleDeClasse');

// Ajout des fichiers nécessaire au bon fonctionnement du site
include_once 'models/database.php';
include_once 'models/teachers.php';
include_once 'models/activities.php';
include_once 'models/activityBySchoolDegree.php';
include_once 'models/categories.php';
include_once 'models/comments.php';
include_once 'models/favorites.php';
include_once 'models/picturesProfil.php';
include_once 'models/schoolDegrees.php';

