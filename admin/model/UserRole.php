<?php

class UserRole {

    public $id;
    public $type;
    public $description;

    public function __construct($array = []) {
        $this->id = isset($array['id_user_role']) ? $array['id_user_role'] : -1;
        $this->type = isset($array['type']) ? $array['type'] : -1;
        $this->description = isset($array['description']) ? $array['description'] : "default";
    }

    public static function getList() {
        try {
            $pdo = DB_Pdo::getPdoConnection();
            $stmt = $pdo->query(UserRole::$SQL_SELECT_LIST);
            $stmt->execute();
            $list = [];
            while ($row = $stmt->fetch()) {
                $list[] = new UserRole($row);
            }
            return $list;
        } catch (PDOException $pdoe) {
            var_dump("Greska u getByUsername", $pdoe);
            return null;
        }
    }

    public static function getById($id) {
        try {
            $pdo = DB_Pdo::getPdoConnection();
            $stmt = $pdo->prepare(UserRole::$SQL_BY_ID);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $row = $stmt->fetch();
            return new UserRole($row);
        } catch (PDOException $pdoe) {
            var_dump("Greska u getByUsername", $pdoe);
            return null;
        }
    }

    public static $SQL_SELECT_LIST = "SELECT * FROM user_role WHERE active = 1";
    public static $SQL_BY_ID = "SELECT * FROM user_role WHERE id_user_role = :id";

    public static function log_db_error($message) {
        file_put_contents("error_db_" . $date = date('Y-m-d_H-i-s'), $message);
    }

}
