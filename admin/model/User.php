<?php

class User {

    public $id;
    public $username;
    public $password;
    public $name;
    public $idUserRole;
    public $isAdmin;
    public $isLoggedIn = false;

    //parametri ostali

    public function __construct($params = array()) {
        $this->id = isset($params['id_user']) ? $params['id_user'] : -1;
        $this->username = isset($params['username']) ? $params['username'] : -1;
        $this->password = isset($params['password']) ? $params['password'] : -1;
        $this->name = isset($params['name']) ? $params['name'] : -1;
        $this->isAdmin = isset($params['is_admin']) ? $params['is_admin'] : -1;
        $this->idUserRole = isset($params['fk_id_user_role']) ? $params['fk_id_user_role'] : -1;
        $this->isLoggedIn = false;
    }

    static function login($username, $password) {
        $hashedPassword = hash('sha512', $password);

        $user = User::getByUsername($username);

        return ($user->username === $username && strtolower($user->password) === strtolower($hashedPassword) && $user->isAdmin == true);
    }

    static function getByUsername($username) {
        try {
            //komunikacija sa bazom...
            $pdo = DB_Pdo::getPdoConnection();
            $stmt = $pdo->prepare(User::$SQL_SELECT_BY_USERNAME);
            $stmt->bindParam('username', $username);
            $stmt->execute();

            return new User($stmt->fetch());
        } catch (PDOException $pdoe) {
            var_dump("Greska u getByUsername", $pdoe);
            return new User();
        }
    }

    static function getList($limit = 10) {
        try {
            $pdo = DB_Pdo::getPdoConnection();
            $stmt = $pdo->query(User::$SQL_SELECT_LIST);
            $stmt->execute();
            $list = [];
            $row = null;
            while ($row = $stmt->fetch()) {
                $list[] = new User($row);
            }
            return $list;
        } catch (PDOException $pdoe) {
            var_dump("Greska u getByUsername", $pdoe);
            return null;
        }
    }

    public static function isLoggedIn() {
        return (isset($_SESSION['isLoggedIn']) && isset($_SESSION['isAdmin']) && $_SESSION['isLoggedIn'] == true && $_SESSION['isAdmin'] == true );
    }

    public static function getById($id) {
        try {
            $pdo = DB_Pdo::getPdoConnection();
            $stmt = $pdo->prepare(User::$SQL_SELECT_BY_ID);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $row = $stmt->fetch();
            return new User($row);
        } catch (PDOException $pdoe) {
            var_dump("Greska u getByUsername", $pdoe);
            return null;
        }
    }

    private static $SQL_SELECT_BY_ID = "SELECT * FROM user WHERE id_user = :id";
    private static $SQL_SELECT_BY_USERNAME = "SELECT * FROM user where username = :username AND status = 1 AND active = 1";
    private static $SQL_SELECT_LIST = "SELECT * FROM user WHERE status = 1 AND active = 1";

}
