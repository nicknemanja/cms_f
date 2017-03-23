<?php

class ArticleCategory {

    public $id = null;
    public $idArticleCategory;
    public $idMenuItem;
    public $title = null;
    public $content = null;
    public $status = null;
    public $isShown = null;

    public function __construct($params = []) {
        $this->id = $isset($params['id_article_category']) ? $params['id_article_category'] : -1;
        $this->idArticleCategory = isset($params['fk_id_article_category']) ? $params['fk_id_article_category'] : -1;
        $this->idMenuItem = isset($params['fk_id_menu_item']) ? $params['fk_id_menu_item'] : -1;
        $this->title = isset($params['title']) ? $params['title'] : "default";
        $this->content = isset($params['content']) ? $params['content'] : "default";
        $this->isShown = isset($params['is_shown']) ? $params['is_shown'] : -1;
    }

    public static function insert() {
        var_dump("Uraditi ArticleCategory::insert");
        die();
    }

    public static function getList() {
        var_dump("Uraditi ArticleCategory::getList");
        die();
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
            log_db_error($pdoe);
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

    private static $SQL_SELECT_LIST = "SELECT * FROM article_category WHERE active = 1";

}
