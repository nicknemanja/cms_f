<?php

class User {

    public $isLoggedIn = false;
    public $id = null;
    public $username = null;
    public $name = null;
    public $idUserRule = null;

    //parametri ostali

    public function __construct($params = array()) {
        $this->id = isset($params['id_user']) ? $params['id_user'] : '';
        $this->username = isset($params['username']) ? $params['username'] : '';
        $this->name = isset($params['name']) ? $params['name'] : '';
        $this->idUserRule = isset($params['fk_id_user_role']) ? $params['fk_id_user_role'] : -1;
    }

    static function login($username, $password) {
        //TODO uraditi logiku logina i vratiti boolean
        var_dump("login na user modelu na frontendu");
        die();
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

    public static function getList($limit = 10, $page = 1, $order = 'ASC') {
        $pdo = DB_Pdo::getPdoConnection();
    }

    public static function deleteById($id) {
        try {
            $pdo = DB_Pdo::getPdoConnection();
            $stmt = $pdo->prepare(User::$SQL_DELETE_BY_ID);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (PDOException $pdoe) {
            log_db_error($pdoe);
            return false;
        }
    }

    private static $SQL_DELETE_BY_ID = "UPDATE user SET active = 0 WHERE id = :id";

}
