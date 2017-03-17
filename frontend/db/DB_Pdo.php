<?php

class DB_Pdo {

    static $DB_DSN = 'mysql:host=localhost;dbname=cms_j';
    static $DB_USER = 'test';
    static $DB_PASSWORD = 'test';
    static $PDO_CONNECITION = null;

    static function getPdoConnection() {
        return is_null(DB_Pdo::$PDO_CONNECITION) ? new PDO(DB_Pdo::$DB_DSN, DB_Pdo::$DB_USER, DB_Pdo::$DB_PASSWORD) : DB_Pdo::$PDO_CONNECITION;
    }

}
