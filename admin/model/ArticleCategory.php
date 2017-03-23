<?php

class ArticleCategory {

    public $id = null;
    public $title = null;
    public $isShown = null;

    public function __construct($params = []) {
        $this->id = isset($params['id_article_category']) ? $params['id_article_category'] : -1;
        $this->title = isset($params['title']) ? $params['title'] : "default";
        $this->isShown = isset($params['is_shown']) ? $params['is_shown'] : -1;
    }

    public static function insert() {
        var_dump("Uraditi ArticleCategory::insert");
        die();
    }

    public static function getList() {
        try {
            $pdo = DB_Pdo::getPdoConnection();
            $stmt = $pdo->query(ArticleCategory::$SQL_SELECT_LIST);
            $stmt->execute();
            $list = [];
            $row = null;
            while ($row = $stmt->fetch()) {
                $list[] = new ArticleCategory($row);
            }
            return $list;
        } catch (PDOException $pdoe) {
            ArticleCategory::log_db_error($pdoe);
            return null;
        }
    }

    public static function update() {
        var_dump("Uraditi ArticleCategory::update");
        die();
    }

    public static function deleteById() {
        var_dump("Uraditi ArticleCategory::deleteById");
        die();
    }
    
    public static function getById($id){
        try {
            $pdo = DB_Pdo::getPdoConnection();
            $stmt = $pdo->prepare(ArticleCategory::$SQL_SELECT_BY_ID);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return new ArticleCategory($stmt->fetch());
        } catch (PDOException $pdoe) {
            ArticleCategory::log_db_error($pdoe);
            return null;
        }
    }

    private static $SQL_SELECT_LIST = "SELECT * FROM article_category WHERE active = 1";
    private static $SQL_SELECT_BY_ID = "SELECT * FROM article_category WHERE id_article_category = :id";

    public static function log_db_error($message) {
        file_put_contents("error_db_" . $date = date('Y-m-d_H-i-s'), $message);
    }

}
