<?php

class User {

    public $isLoggedIn = false;

    //parametri ostali

    public function __construct($params = array()) {
        
    }

    static function login($username, $password) {
        //TODO uraditi logiku logina i vratiti boolean
        return true;
    }

    static function getByUsername($username) {
        //komunikacija sa bazom...
        return "";
    }

    public static function isLoggedIn() {
        if (isset($_SESSION['isLoggedIn'])) {
            return $_SESSION['isLoggedIn'];
        }
        return false;
    }

}
