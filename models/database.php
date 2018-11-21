<?php

/**
 * Création de la classe database permettant de se connecter à la base de donnée MYSQL
 */
class database {

    private static $dbase;

    /**
     * méthode qui permet de vérifier si la classe a été instanciée, si non: elle la créée, si oui, elle la retourne (utilisation du singleton)
     */
    public static function getInstance() {
        if (is_null(self::$dbase)) {
            try {
                self::$dbase = new PDO('mysql:host=' . HOST . ';port=' . PORT . ';dbname=' . DBNAME . ';charset=' . CHARSET . ';', LOGIN, PASSWORD);
                self::$dbase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //TODO REMOVE TO AVOID DISPLAYING SQL ERROR
            } catch (Exception $e) { // catch error message
                die('Erreur : ' . $e->getMessage());
            }
        }
        return self::$dbase;
    }
/**
 * Méthode qui permet de récupérer le dernier id inséré dans la base de données
 */
    public function getLastInsertId() {
        $result = 0;
        $query = 'SELECT LAST_INSERT_ID() AS `id`';
        $result = self::getInstance()->prepare($query);
        if($result->execute()){
            if (is_object($result)) {
                $result = $result->fetch(PDO::FETCH_COLUMN);
            }
        }
        return $result;
    }


    public function __destruct() {
        $dbase = NULL;
    }

}

?>