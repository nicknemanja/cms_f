<?php

class MenuItem {

    public $id = null;
    public $title = null;
    public $isShown = null;

    public function __construct($params = []) {
        $this->id = isset($params['id_menu_item']) ? $params['id_menu_item'] : -1;
        $this->title = isset($params['title']) ? $params['title'] : "default";
        $this->isShown = isset($params['is_shown']) ? $params['is_shown'] : -1;
    }

    public static function insert() {
        var_dump("Uraditi MenuItem::insert");
        die();
    }

    public static function getList() {

        try {
            $pdo = DB_Pdo::getPdoConnection();
            $stmt = $pdo->query(MenuItem::$SQL_SELECT_LIST);
            $stmt->execute();
            $list = [];
            $row = null;
            while ($row = $stmt->fetch()) {
                $list[] = new MenuItem($row);
            }
            return $list;
        } catch (PDOException $pdoe) {
            MenuItem::log_db_error($pdoe);
            return null;
        }
    }

    public static function update() {
        var_dump("Uraditi MenuItem::update");
        die();
    }

    public static function deleteById() {
        var_dump("Uraditi MenuItem::deleteById");
        die();
    }

    public static function getById($id) {
        try {
            $pdo = DB_Pdo::getPdoConnection();
            $stmt = $pdo->prepare(MenuItem::$SQL_SELECT_BY_ID);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return new ArticleCategory($stmt->fetch());
        } catch (PDOException $pdoe) {
            ArticleCategory::log_db_error($pdoe);
            return null;
        }
    }

    private static $SQL_SELECT_LIST = "SELECT * FROM menu_item WHERE active = 1";
    private static $SQL_SELECT_BY_ID = "SELECT * FROM menu_item WHERE id_menu_item = :id";

    public static function log_db_error($message) {
        file_put_contents("error_db_" . $date = date('Y-m-d_H-i-s'), $message);
    }

}
