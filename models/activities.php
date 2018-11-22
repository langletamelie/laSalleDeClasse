<?php

/**
 * Création de la classe activities
 */
class activities extends database {

    public $id;
    public $name;
    public $object;
    public $planning;
    public $progress;
    public $resultOfActivity;
    public $idCategories;
    public $idTeachers;
 

    /**
     * Méthode pour ajouter un atelier
     */
    public function addActivity() {
        $query = 'INSERT INTO `MOUET_activities` (`name`, `object`, `planning`, `progress`, `resultOfActivity`, `idCategories`, `idTeachers`) '
                . 'VALUES (:name, :object, :planning, :progress, :resultOfActivity, :idCategories, :idTeachers)';
        $insertInActivitiesTable = database::getInstance()->prepare($query);
        $insertInActivitiesTable->bindValue(':name', $this->name, PDO::PARAM_STR);
        $insertInActivitiesTable->bindValue(':object', $this->object, PDO::PARAM_STR);
        $insertInActivitiesTable->bindValue(':planning', $this->planning, PDO::PARAM_STR);
        $insertInActivitiesTable->bindValue(':progress', $this->progress, PDO::PARAM_STR);
        $insertInActivitiesTable->bindValue(':resultOfActivity', $this->resultOfActivity, PDO::PARAM_STR);
        $insertInActivitiesTable->bindValue(':idCategories', $this->idCategories, PDO::PARAM_INT);
        $insertInActivitiesTable->bindValue(':idTeachers', $this->idTeachers, PDO::PARAM_INT);
        return $insertInActivitiesTable->execute();
    }

    /**
     * Méthode pour modifier un atelier
     */

     public function updateAnActivity(){
        $query = 'UPDATE `MOUET_activities` SET `name` = :name, `object` = :object, `planning` = :planning, `progress` = :progress, `resultOfActivity` = :resultOfActivity, `idCategories` = :idCategories WHERE `id` = :id';
        $updateActivity = database::getInstance()->prepare($query);
        $updateActivity->bindValue(':name', $this->name, PDO::PARAM_STR);
        $updateActivity->bindValue(':object', $this->object, PDO::PARAM_STR);
        $updateActivity->bindValue(':planning', $this->planning, PDO::PARAM_STR);
        $updateActivity->bindValue(':progress', $this->progress, PDO::PARAM_STR);
        $updateActivity->bindValue(':resultOfActivity', $this->resultOfActivity, PDO::PARAM_STR);
        $updateActivity->bindValue(':idCategories', $this->idCategories, PDO::PARAM_INT); 
        return $updateActivity->execute();
    }
     
    /**
     * Méthode pour rechercher un atelier 
     */
    public function getActivityByTeacherChoice() {
        $result = array();
        $query = 'SELECT `acts`.`id`, `acts`.`name`, `acts`.`object`, `acts`.`planning`, `acts`.`progress`, `acts`.`resultOfActivity`'
                . 'FROM `MOUET_activities` AS `acts`'
                . 'LEFT JOIN `MOUET_categories` AS `catgrs` ON `acts`.`idCategories` = `catgrs`.`id`'
                . 'INNER JOIN `MOUET_activityBySchoolDegree` AS `actBySD` ON `actBySD`.`idActivities` = `acts`.`id`'
                . 'LEFT JOIN `MOUET_schoolDegrees` AS `schDgr` ON `schDgr`.`id` = `actBySD`.`idSchoolDegrees`'
                . 'WHERE `catgrs`.`id` = :idCategories AND `schDgr`.`id` = :idSchoolDegrees';
        $displayActivityFromTeacherChoice = database::getInstance()->prepare($query);
        $displayActivityFromTeacherChoice->bindValue(':idCategories', $this->idCategories, PDO::PARAM_INT);
        $displayActivityFromTeacherChoice->bindValue(':idSchoolDegrees', $this->idSchoolDegrees, PDO::PARAM_INT);
        if ($displayActivityFromTeacherChoice->execute()) {
            $result = $displayActivityFromTeacherChoice->fetchAll(PDO::FETCH_OBJ);
        }
        return $result;
    }

    /**
     * Méthode pour afficher un atelier
     */

     public function displayActivity() {
         $query = 'SELECT `acts`.`id`, `acts`.`name`, `acts`.`object`, `acts`.`planning`, `acts`.`progress`, `acts`.`resultOfActivity`, `acts`.`idCategories` '
                . 'FROM `MOUET_activities` AS `acts`'
                . 'WHERE `id` = :id';
         $displayActivity = database::getInstance()->prepare($query);
         $displayActivity->bindValue(':id', $this->id, PDO::PARAM_INT);
          if ($displayActivity->execute()) {
              if (is_object($displayActivity)){
                  $result = $displayActivity->fetch(PDO::FETCH_OBJ);
              }
          }
          return $result;
     }

/**
 * Méthode pour afficher sur le profil du professeur les ateliers qu'il a proposé
 */

 public function getActivityThatTheTeacherProposed() {
 $result = array();
 $query = 'SELECT `acts`.`id`, `acts`.`name`, `acts`.`object` FROM `MOUET_activities` AS `acts` WHERE `idTeachers` = :idTeachers';
 $displayListActivitiesThatTeacherAdd = database::getInstance()->prepare($query);
 $displayListActivitiesThatTeacherAdd->bindValue(':idTeachers', $this->idTeachers, PDO::PARAM_INT);
 if ($displayListActivitiesThatTeacherAdd->execute()) {
    $result = $displayListActivitiesThatTeacherAdd->fetchAll(PDO::FETCH_OBJ);
}
return $result;
 }



/**
 * Méthode pour afficher les ateliers enregistrés en favoris par le professeur
 */
 public function getFavoriteActivityOfATeacher() {
    $result = array();
    $query = 'SELECT `acts`.`id`, `acts`.`name`, `acts`.`object` '
    . 'FROM `MOUET_activities` AS `acts` '
    . 'LEFT JOIN `MOUET_favorites` AS `fav` ON `acts`.`id` = `fav`.`idActivities` '
    . 'LEFT JOIN `MOUET_teachers` AS `tchs` ON `tchs`.`id` = `fav`.`idTeachers` '
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
