<?php

/**
 * Création de la classe categories
 */
class categories extends database {

    public $id;
    public $name;



/**
 * Méthode pour l'affichage des différentes catégories
 */
    public function getCategoriesList() {
        $isObjectResult = array();
        $PDOResult = database::getInstance()->query('SELECT `id`, `name` FROM `MOUET_categories` ORDER BY `name`');
             
        if (is_object($PDOResult)) {
            $isObjectResult = $PDOResult->fetchAll(PDO::FETCH_OBJ);
        } 
        return $isObjectResult;
    }




}