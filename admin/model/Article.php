<?php

class Article {

//parameters
    public $id;
    public $title;
    public $content;

    public function __construct($params = array()) {
        $this->id = isset($params['id_article']) ? $params['id_article'] : -1;
        $this->title = isset($params['title']) ? $params['title'] : "defaultTitle";
        $this->content = isset($params['content']) ? $params['content'] : "defaultTitle";
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
            var_dump($pdoe);
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
            var_dump($pdoe);
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
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $pdoe) {
            file_put_contents("error_db_" . $date = date('Y-m-d_H-i-s'), $pdoe);
            return false;
        }
    }

    static $LIMIT = 10;
    static $SQL_SELECT_BY_ID = "SELECT * FROM article WHERE id_article = :id LIMIT 1";
    static $SELECT_LIST = "SELECT * FROM article WHERE is_shown = 1 AND active = 1";
    static $SQL_DELETE_BY_ID = "UPDATE article SET active = 0 WHERE id_article = :id";

}
