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
    public $selectCategories;
    public $selectSchoolDegrees;

 

    /**
     * Méthode pour ajouter une activité
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
     * Méthode pour rechercher une activité 
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
     * Méthode pour afficher une activité
     */

     public function displayActivity() {
         $query = 'SELECT `acts`.`id`, `acts`.`name`, `acts`.`object`, `acts`.`planning`, `acts`.`progress`, `acts`.`resultOfActivity`'
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
 * Méthode pour afficher sur le profil du professeur les activités qu'il a proposé
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






}
