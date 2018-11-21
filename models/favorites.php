<?php

/**
 * Création de la classe favorites
 */

 class favorites extends database {

public $id;
public $idActivities;
public $idTeachers;


/**
 * Méthode pour insérer les id d'une activité et du professeur dans la table lorsque celui-ci ajoute une activité dans ses favoris
 */
 public function insertActivityAndTeacherInTableWhenATeacherAddAnActivityInHisFavorites() {
 $query = 'INSERT INTO `MOUET_favorites` (`idActivities`, `idTeachers`) VALUES (:idActivities, :idTeachers)';
 $insertIdsInTable = database::getInstance()->prepare($query);
 $insertIdsInTable->bindValue(':idActivities', $this->idActivities, PDO::PARAM_INT);
 $insertIdsInTable->bindValue(':idTeachers', $this->idTeachers, PDO::PARAM_INT);
 return $insertIdsInTable->execute();
}

  /**
   * Méthode pour vérifier si un professeur a déjà ajouter un atelier en favoris
   */
public function checkIfTeacherAlreadyAddAnActivityInFavorite() {
 $query = 'SELECT COUNT(`id`) AS `count` '
 . 'FROM `MOUET_favorites` '
 . 'WHERE `idActivities` = :idActivities AND `idTeachers` = :idTeachers ';
 $ifFavoriteExist = database::getInstance()->prepare($query);
 $ifFavoriteExist->bindValue(':idActivities', $this->idActivities, PDO::PARAM_INT);
 $ifFavoriteExist->bindValue(':idTeachers', $this->idTeachers, PDO::PARAM_INT);
 if ($ifFavoriteExist->execute()) {
     $result = $ifFavoriteExist->fetch(PDO::FETCH_OBJ);
     $check = $result->count;
 }
 return $check;
}

/**
 * Méthode pour afficher les ateliers enregistrés en favoris par le professeur
 */
public function getFavoriteActivityOfATeacher() {
    $result = array();
    $query = 'SELECT `acts`.`id`, `acts`.`name`, `acts`.`object` '
    . 'FROM `MOUET_activities` AS `acts` '
    . 'RIGHT JOIN `MOUET_favorites` AS `fav` ON `acts`.`id` = `fav`.`idActivities` '
    . 'RIGHT JOIN `MOUET_teachers` AS `tchs` ON `tchs`.`id` = `fav`.`idTeachers` '
    . 'WHERE `fav`.`idTeachers` = :idTeachers AND `fav`.`idActivities` = :idActivities ';
    $displayFavoritesActivities = database::getInstance()->prepare($query);
    $displayFavoritesActivities->bindValue(':idTeachers', $this->idTeachers, PDO::PARAM_INT);
    $displayFavoritesActivities->bindValue(':idActivities', $this->idActivities, PDO::PARAM_INT);
    if ($displayFavoritesActivities->execute()) {
        $result = $displayFavoritesActivities->fetchAll(PDO::FETCH_OBJ);
    }
    return $result; 
}

}