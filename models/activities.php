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
    public $selectCategories;
    public $selectSchoolDegrees;
    public function __construct() {
        parent::__construct();
        $this->dbConnect();
 }

 /**
  * Méthode pour ajouter une activité
  */
public function addActivity() {
    $query = 'INSERT INTO `MOUET_activities` (`name`, `object`, `planning`, `progress`, `resultOfActivity`, `idCategories`) '
            . 'VALUES (:name, :object, :planning, :progress, :resultOfActivity, :idCategories)';
    $insertInActivitiesTable = $this->dbase->prepare($query);
    $insertInActivitiesTable->bindValue(':name', $this->name, PDO::PARAM_STR);
    $insertInActivitiesTable->bindValue(':object', $this->object, PDO::PARAM_STR);
    $insertInActivitiesTable->bindValue(':planning', $this->planning, PDO::PARAM_STR);
    $insertInActivitiesTable->bindValue(':progress', $this->progress, PDO::PARAM_STR);
    $insertInActivitiesTable->bindValue(':resultOfActivity', $this->resultOfActivity, PDO::PARAM_STR);
    $insertInActivitiesTable->bindValue(':idCategories', $this->idCategories, PDO::PARAM_INT);
return $insertInActivitiesTable->execute();
}


 /**
  * Méthode pour afficher une activité
  */
public function getActivityByTeacherChoice() {
    $result = array();
    $query = 'SELECT `acts`.`name`, `acts`.`object`, `acts`.`planning`, `acts`.`progress`, `acts`.`resultOfActivity`'
            . 'FROM `MOUET_activities` AS `acts`'
            . 'LEFT JOIN `MOUET_categories` AS `catgrs` ON `acts`.`idCategories` = `catgrs`.`id`'
            . 'LEFT JOIN `MOUET_activityBySchoolDegree` AS `actBySD` ON `actBySD`.`idActivities` = `acts`.`id`'
            . 'LEFT JOIN `MOUET_schoolDegrees` AS `schDgr` ON `schDgr`.`id` = `actBySD`.`idSchoolDegrees`'
            . 'WHERE `catgrs`.`id` = :idCategories AND `schDgr`.`id` = :idSchoolDegrees';
    $displayActivityFromTeacherChoice = $this->dbase->prepare($query);
    $displayActivityFromTeacherChoice->bindValue(':idCategories', $this->selectCategories, PDO::PARAM_INT);
    $displayActivityFromTeacherChoice->bindValue(':idSchoolDegrees', $this->selectSchoolDegrees, PDO::PARAM_INT);
    if ($displayActivityFromTeacherChoice->execute()) {
        $result = $displayActivityFromTeacherChoice->fetchAll(PDO::FETCH_OBJ);
    }
    return $result;
}



}