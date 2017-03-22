<?php

class Language {

    public $id = null;
    public $language = null;
    public $isShown = null;
    public $imagePath = null;

    public function __construct() {
        $this->id = isset($params['id_language']) ? $params['id_language'] : -1;
        $this->language = isset($params['language']) ? $params['language'] : "default";
        $this->isShown = isset($params['is_shown']) ? $params['is_shown'] : -1;
        $this->imagePath = isset($params['image_path']) ? $params['image_path'] : "default";
    }

    public static function getList() {
        try {
            $pdo = DB_Pdo::getPdoConnection();
            $stmt = $pdo->query(Article::$SQL_SELECT_LIST);
            $stmt->execute();
            $row = null;
            $list = [];
            while ($row = $stmt->fetch()) {
                $list[] = new Language($row);
            }
            return $list;
        } catch (PDOException $pdoe) {
            log_db_error($pdoe);
            return null;
        }
    }

    private static $SQL_SELECT_LIST = "SELECT * FROM language WHERE active = 1";

}
