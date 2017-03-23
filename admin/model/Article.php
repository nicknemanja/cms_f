<?php

class Article {

//parameters
    public $id = null;
    public $idArticleCategory = null;
    public $articleCategory = null;
    public $idMenuItem = null;
    public $menuItem = null;
    public $title = null;
    public $content = null;
    public $status = null;
    public $isShown = null;

    public function __construct($params = array()) {
        $this->id = isset($params['id_article']) ? $params['id_article'] : -1;
        $this->idArticleCategory = isset($params['fk_id_article_category']) ? $params['fk_id_article_category'] : -1;
        $this->articleCategory = ArticleCategory::getById($this->idArticleCategory)->title;
        $this->idMenuItem = isset($params['fk_id_menu_item']) ? $params['fk_id_menu_item'] : -1;
        $this->menuItem = MenuItem::getById($this->idMenuItem)->title;
        $this->title = isset($params['title']) ? $params['title'] : "default";
        $this->content = isset($params['content']) ? $params['content'] : "default";
        $this->isShown = isset($params['is_shown']) ? $params['is_shown'] : -1;
    }

    public static function getList($limit = 10, $order = 'ASC') {
        try {
            $pdo = DB_Pdo::getPdoConnection();
//TODO Nastaviti rad
            $stmt = $pdo->prepare(Article::$SELECT_LIST);

            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindParam(':order', $order, PDO::PARAM_STR);

            $stmt->execute();

            $row = null;
            $list = [];
            while ($row = $stmt->fetch()) {
                $list[] = new Article($row);
            }

            return $list;
        } catch (PDOException $pdoe) {
            Article::log_db_error($pdoe);
            return null;
        }
    }

    public static function getById($id = -1) {
        try {
            $pdo = DB_Pdo::getPdoConnection();
            $stmt = $pdo->prepare(Article::$SQL_SELECT_BY_ID);

            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $row = null;
            if (($row = $stmt->fetch())) {
                return new Article($row);
            }
            return null;
        } catch (PDOException $pdoe) {
            Article::log_db_error($pdoe);
            return null;
        }
    }

    public static function deleteById($id = -1) {
        try {
            $article = Article::getById($id);

            if ($article === null) {
                return false;
            }

            $pdo = DB_Pdo::getPdoConnection();
            $stmt = $pdo->prepare(Article::$SQL_DELETE_BY_ID);

            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (PDOException $pdoe) {
            Article::log_db_error($pdoe);
            return false;
        }
    }

    public static function insert($article) {
        try {
            $pdo = DB_Pdo::getPdoConnection();
            $stmt = $pdo->prepare(Article::$SQL_INSERT);

            $stmt->bindParam(":articleCategory", $article->idArticleCategory);
            $stmt->bindParam(":menuItem", $article->idMenuItem);
            $stmt->bindParam(":title", $article->title);
            $stmt->bindParam(":content", $article->content);
            $stmt->bindParam("isShown", $article->isShown);

            return $stmt->execute();
        } catch (PDOException $pdoe) {
            Article::log_db_error($pdoe);
            return false;
        }
    }

    public static function log_db_error($message) {
        file_put_contents("error_db_" . $date = date('Y-m-d_H-i-s'), $message);
    }

    public static function update($article) {
        try {
            $pdo = DB_Pdo::getPdoConnection();
            $stmt = $pdo->prepare(Article::$SQL_UPDATE);

            $stmt->bindParam(":articleCategory", $article->idArticleCategory);
            $stmt->bindParam(":menuItem", $article->idMenuItem);
            $stmt->bindParam(":title", $article->title);
            $stmt->bindParam(":content", $article->content);
            $stmt->bindParam(":isShown", $article->isShown);
            $stmt->bindParam(":id", $article->id);

            return $stmt->execute();
        } catch (PDOException $pdoe) {
            Article::log_db_error($pdoe);
            return false;
        }
    }

    static $LIMIT = 10;
    static $SQL_SELECT_BY_ID = "SELECT * FROM article WHERE id_article = :id LIMIT 1";
    static $SELECT_LIST = "SELECT * FROM article WHERE is_shown = 1 AND active = 1";
    static $SQL_DELETE_BY_ID = "UPDATE article SET active = 0 WHERE id_article = :id";
    static $SQL_INSERT = "INSERT INTO article(fk_id_article_category,fk_id_menu_item,title,content,is_shown) VALUES (:articleCategory,:menuItem,:title, :content,:isShown)";
    static $SQL_UPDATE = "UPDATE article SET fk_id_article_category = :articleCategory, fk_id_menu_item = :menuItem, title = :title, content = :content, is_shown = :isShown WHERE id_article=:id";

}
