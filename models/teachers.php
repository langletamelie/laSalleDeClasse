<?php

/**
 * Création de la classe teachers
 */
class teachers extends database {

    public $id;
    public $lastname;
    public $firstname;
    public $username;
    public $city;
    public $mail;
    public $password;
    public $idPicturesProfil;


    /**
     * méthode pour ajouter des professeurs
     */
    public function addTeacher() {
        $query = 'INSERT INTO `MOUET_teachers` (`lastname`, `firstname`, `city`, `username`, `password`, `mail`) '
                . 'VALUES (:lastname, :firstname, :city, :username, :password, :mail)';
        $insertInTeachersTable = database::getInstance()->prepare($query);
        $insertInTeachersTable->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $insertInTeachersTable->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $insertInTeachersTable->bindValue(':city', $this->city, PDO::PARAM_STR);
        $insertInTeachersTable->bindValue(':username', $this->username, PDO::PARAM_STR);
        $insertInTeachersTable->bindValue(':password', $this->password, PDO::PARAM_STR);
        $insertInTeachersTable->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        return $insertInTeachersTable->execute();
    }

    /**
     * Méthode pour vérifie si un professeur est déjà dans la base de données
     */
    public function checkIfTeacherExist() {
        $query = 'SELECT COUNT(`id`) AS `count` '
                . 'FROM `MOUET_teachers` '
                . 'WHERE `lastname` = :lastname AND `firstname` = :firstname AND `mail` = :mail';
        $ifTeacherExist = database::getInstance()->prepare($query);
        $ifTeacherExist->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $ifTeacherExist->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $ifTeacherExist->bindValue(':mail', $this->mail, PDO::PARAM_STR);

        if ($ifTeacherExist->execute()) {
            $result = $ifTeacherExist->fetch(PDO::FETCH_OBJ);
            $check = $result->count;
        } else {
            $check = FALSE;
        }
        return $check;
    }

    /**
     * Méthode pour vérifier si le nom d'utilisteur existe déjà
     */
    public function checkIfUsernameExist() {
        $query = 'SELECT COUNT(`id`) AS `count` FROM `MOUET_teachers` WHERE `username` = :username';
        $ifUsernameExist = database::getInstance()->prepare($query);
        $ifUsernameExist->bindValue(':username', $this->username, PDO::PARAM_STR);

        if ($ifUsernameExist->execute()) {
            $result = $ifUsernameExist->fetch(PDO::FETCH_OBJ);
            $check = $result->count;
        } else {
            $check = FALSE;
        }
        return $check;
    }

    /**
     * Méthode permettant à l'utilisateur de se connecter
     */
    public function teacherConnection() {
        $state = false;
        $query = 'SELECT `id`, `username`, `password` '
                . 'FROM `MOUET_teachers` '
                . 'WHERE `username` = :username';
        $result = database::getInstance()->prepare($query);
        $result->bindValue(':username', $this->username, PDO::PARAM_STR);
        if ($result->execute()) { //on vérifie que la requête s'est exécutée
            $selectResult = $result->fetch(PDO::FETCH_OBJ);
            if (is_object($selectResult)) { //On vérifie que l'on a bien trouvé un utilisateur
                //On hydrate 
                $this->id = $selectResult->id;
                $this->username = $selectResult->username;
                $this->password = $selectResult->password;
                $state = true;
            }
        }
        return $state;
    }

    /**
     * Méthode pour afficher le profil du professeur sur sa page de profil 
     */
    public function displayProfilTeacher() {
        $displayUsernameAndPictureProfil = array();
        $query = 'SELECT `tchs`.`id`, `tchs`.`username`, `picPro`.`name` '
                . 'FROM `MOUET_teachers` AS `tchs` '
                . 'LEFT JOIN `MOUET_picturesProfil` AS `picPro` '
                . 'ON `tchs`.`idPicturesProfil` = `picPro`.`id`'
                . 'WHERE `tchs`.`id` = :id';
        $displayUsernameAndPictureProfil = database::getInstance()->prepare($query);
        $displayUsernameAndPictureProfil->bindValue(':id', $this->id, PDO::PARAM_INT);
        if($displayUsernameAndPictureProfil->execute()) {
        if (is_object($displayUsernameAndPictureProfil)) {
            $result = $displayUsernameAndPictureProfil->fetch(PDO::FETCH_OBJ);
        } 
    }
        return $result;
    }
 
    /**
     * Méthode pour modifier le mot de passe de l'utilisateur
     */
public function modifyPasswordByTeacher() {
    $query = 'UPDATE `MOUET_teachers` SET `password` = :password WHERE `id` = :id';
    $updatePasswordInTable = database::getInstance()->prepare($query);
    $updatePasswordInTable->bindValue(':id', $this->id, PDO::PARAM_INT);
    $updatePasswordInTable->bindValue(':password', $this->password, PDO::PARAM_STR);
    return $updatePasswordInTable->execute();
}

/**
 * Méthode pour modifier la photo de profil du professeur
 */
public function changePictureProfil() {
    $query = 'UPDATE `MOUET_teachers` SET `idPicturesProfil` = :idPicturesProfil WHERE `id` = :id';
    $updatePictureProfil = database::getInstance()->prepare($query);
    $updatePictureProfil->bindValue(':id', $this->id, PDO::PARAM_INT);
    $updatePictureProfil->bindValue(':idPicturesProfil', $this->idPicturesProfil, PDO::PARAM_INT);
    return $updatePictureProfil->execute();
}


}
