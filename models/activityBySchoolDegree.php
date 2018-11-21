<?php

/**
 * Création de la classe activityBySchoolDegree
 */
class activityBySchoolDegree extends database {

    public $id;
    public $idActivities;
    public $idSchoolDegrees;



/**
 * Méthode pour ajouter l'id d'un atelier quand un professeur ajoute un atelier
 */
public function insertActivityInTableWhenATeacherAddAnActivity() {
    $query = 'INSERT INTO `MOUET_activityBySchoolDegree` (`idActivities`) '
            . 'VALUES (:idActivities)';
            $insertActsInTable = database::getInstance()->prepare($query);
            $insertActsInTable->bindValue(':idActivities', $this->idActivities, PDO::PARAM_INT);
            return $insertActsInTable->execute();
}

/**
 * Méthode pour ajouter le ou les niveaux scolaires dans la table lorsqu'un professeur ajoute un atelier
 */
public function insertSchoolDegreeInTableWhenAteacherAddAnActivity() {
    $query = 'INSERT INTO `MOUET_activityBySchoolDegree` (`idSchoolDegrees`) '
            . 'VALUES (:idSchoolDegrees)';
            $insertSchDgrInTable = database::getInstance()->prepare($query);
            $insertSchDgrInTable->bindValue(':idSchoolDegrees', $this->idSchoolDegrees, PDO::PARAM_INT);
            return $insertSchDgrInTable->execute();
}
//
///**
// * Méthode pour modifier une activité de la table
// */
//public function insertActivityInTableWhenATeacherAddAnActivity() {
//    $query = 'UPDATE ';
//            $insertActsInTable = database::getInstance()->prepare($query);
//            $insertActsInTable->bindValue(':idActivities', $this->idActivities, PDO::PARAM_INT);
//            return $insertActsInTable->execute();
//}
//
///**
// * Méthode pour modifier le ou les niveaux scolaires dans la table
// */
//public function insertSchoolDegreeInTableWhenAteacherAddAnActivity() {
//    $query = 'UPDATE `IDschoolDegrees` SET  `MOUET_activityBySchoolDegree` (`idSchoolDegrees`) '
//            . 'VALUES (:idSchoolDegrees)';
//            $insertSchDgrInTable = database::getInstance()->prepare($query);
//            $insertSchDgrInTable->bindValue(':idSchoolDegrees', $this->idSchoolDegrees, PDO::PARAM_INT);
//            return $insertSchDgrInTable->execute();
//}
}