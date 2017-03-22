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
            log_db_error($pdoe);
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

    private static $SQL_SELECT_LIST = "SELECT * FROM menu_item WHERE active = 1";

}
