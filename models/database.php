<?php 
/**
 * classe permettant de se connecter à la base de donnée MYSQL
 */

class database {

    protected $dbase;
    private $host = '';
    private $login = '';
    private $password = '';
    private $dbname = '';


    public function __construct() {
        $this->host = HOST;
        $this->login = LOGIN;
        $this->password = PASSWORD;
        $this->dbname = DBNAME;
    }

    /**
     * Méthode permettant de créer l'instance PDO
     */
    protected function dbConnect() {
        try {
            $this->dbase = new PDO('mysql:host=' . $this->host . ';port=3306;dbname=' . $this->dbname . ';charset=UTF8;', $this->login, $this->password);
            $this->dbase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //TODO REMOVE TO AVOID DISPLAYING SQL ERROR
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }
public function __destruct(){
    $this->dbase = NULL;
}
}

?>