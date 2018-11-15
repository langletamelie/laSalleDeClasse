<?php

/**
 * Création de la classe categories
 */
class categories extends database {

    public $id;
    public $name;


    public function __construct() {
        parent::__construct();
        $this->dbConnect();
    }

/**
 * Méthode pour l'affichage des différentes catégories
 */
    public function getCategoriesList() {
        $isObjectResult = array();
        $PDOResult = $this->dbase->query('SELECT `id`, `name` FROM `MOUET_categories` ORDER BY `name`');
             
        if (is_object($PDOResult)) {
            $isObjectResult = $PDOResult->fetchAll(PDO::FETCH_OBJ);
        } 
        return $isObjectResult;
    }









}