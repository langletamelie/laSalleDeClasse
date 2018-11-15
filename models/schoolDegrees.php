<?php

/**
 * Création de la classe schoolDegrees
 */
class schoolDegrees extends database {

    public $id;
    public $name;


    public function __construct() {
        parent::__construct();
        $this->dbConnect();
    }

/**
 * Méthode pour l'affichage des différents niveaux scolaires
 */
    public function getSchoolDegreesList() {
        $isObjectResult = array();
        $PDOResult = $this->dbase->query('SELECT `id`, `name` FROM `MOUET_schoolDegrees`');
             
        if (is_object($PDOResult)) {
            $isObjectResult = $PDOResult->fetchAll(PDO::FETCH_OBJ);
        } 
        return $isObjectResult;
    }









}