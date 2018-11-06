<?php

class teachers extends database {

    public $id = '';
    public $lastname = '';
    public $firstname = '';
    public $username = '';
    public $city = '';
    public $mail = '';
    public $password = '';

    public function __construct() {
        parent::__construct();
        $this->dbConnect();
    }

    
}