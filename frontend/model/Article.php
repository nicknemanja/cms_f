<?php

class Article {

    public $id;
    public $title;
    public $content;

    public function __construct($params = array()) {
        $this->id = isset($params['id']) ? $params['id'] : '-1';
        $this->title = isset($params['title']) ? $params['title'] : '-1';
        $this->content = isset($params['content']) ? $params['content'] : '-1';
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

    static $LIMIT = 10;
    static $SELECT_LIST = "SELECT * FROM article WHERE active is_shown = 1 and active = 1";

}
