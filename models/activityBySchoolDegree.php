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
     * Méthode pour modifier le ou les niveaux scolaires en fonction de l'atelier concerné
     */
    public function insertSchoolDegreeInTableWhenAteacherAddAnActivity() {
        $query = 'UPDATE `MOUET_activityBySchoolDegree` SET `idSchoolDegrees` = :idSchoolDegrees WHERE `idActivities` = :idActivities';
        $modifySchoolDegrees = database::getInstance()->prepare($query);
        $modifySchoolDegrees->bindValue(':idSchoolDegrees', $this->idSchoolDegrees, PDO::PARAM_INT);
        return $modifySchoolDegrees->execute();
    }

}