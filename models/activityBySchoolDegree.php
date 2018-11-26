<?php

/**
 * Création de la classe activityBySchoolDegree
 */
class activityBySchoolDegree extends database {

    public $id;
    public $idActivities;
    public $idSchoolDegrees;

    /**
     * Méthode pour ajouter le ou les niveaux scolaires ainsi que l'atelier concerné lors de l'ajout par le professeur
     */
    public function insertSchoolDegreeAndIdActivitiesInTableWhenATeacherAddAnActivity() {
        $query = 'INSERT INTO `MOUET_activityBySchoolDegree` (`idActivities`, `idSchoolDegrees`) '
                . 'VALUES (:idActivities, :idSchoolDegrees)';
        $insertSchDgrAndIdActInTable = database::getInstance()->prepare($query);
        $insertSchDgrAndIdActInTable->bindValue(':idActivities', $this->idActivities, PDO::PARAM_INT);
        $insertSchDgrAndIdActInTable->bindValue(':idSchoolDegrees', $this->idSchoolDegrees, PDO::PARAM_INT);
        return $insertSchDgrAndIdActInTable->execute();
    }

/**
 * Méthode pour récupérer les id de schoolDegrees 
 */
public function getAllTheSchoolDegreesIds() {
    $query = 'SELECT `MOUET_activityBySchoolDegree`.`idSchoolDegrees` FROM `MOUET_activityBySchoolDegree` WHERE `idActivities` = :idActivities';
    $getAllSchDgrId = database::getInstance()->prepare($query);
    $getAllSchDgrId->bindValue(':idActivities', $this->idActivities, PDO::PARAM_INT);
    if ($getAllSchDgrId->execute()) {
        $result = $getAllSchDgrId->fetchAll(PDO::FETCH_COLUMN,0);
    }
    return $result;
}


    /**
     * Méthode pour modifier le ou les niveaux scolaires en fonction de l'atelier concerné
     */
    public function updateSchoolDegreeWhenAnActivityIsModified() {
        $query = 'UPDATE `MOUET_activityBySchoolDegree` SET `idSchoolDegrees` = :idSchoolDegrees WHERE `id` = :id';
        $modifySchoolDegrees = database::getInstance()->prepare($query);
        $modifySchoolDegrees->bindValue(':idSchoolDegrees', $this->idSchoolDegrees, PDO::PARAM_INT);
        $modifySchoolDegrees->bindValue(':idActivities', $this->idActivities, PDO::PARAM_INT);
        return $modifySchoolDegrees->execute();
    }
/**
 * Méthode pour supprimer un atelier et ses niveaux scolaires correspondants
 */
public function deleteSchDgrByActivity() {
    $query = 'DELETE FROM `MOUET_activityBySchoolDegree` WHERE `idActivities` = :idActivities';
    $schDgrByActDelete = database::getInstance()->prepare($query);
    $schDgrByActDelete->bindValue(':idActivities', $this->idActivities, PDO::PARAM_INT);
    return $schDgrByActDelete->execute();
}
}
