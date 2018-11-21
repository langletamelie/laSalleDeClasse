<?php

/**
 * Création de la classe picturesProfil
 */

 class picturesProfil extends database {

    public $id;
    public $name;

 /**
 * Méthode pour l'affichage des différentes photos de profil possible
 */
public function getPicturesProfilList() {
    $isObjectResult = array();
    $query = 'SELECT `id`, `name` FROM `MOUET_picturesProfil`';
    $getAPictureProfil = database::getInstance()->query($query);
    //ne pas faire de prepare, sinon ça n'affichera pas le select
    if (is_object($getAPictureProfil)) {
        $isObjectResult = $getAPictureProfil->fetchAll(PDO::FETCH_OBJ);
    } 
    return $isObjectResult;
}





 }