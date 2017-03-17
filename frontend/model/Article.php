<?php

class Article {

    public function __construct($params = array()) {
        
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
                var_dump($row);
                $list[] = new User($row);
            }
            return $list;
        } catch (PDOException $pdoe) {
            return null;
        }
    }

    static $LIMIT = 10;
    static $SELECT_LIST = "SELECT * FROM user ";

}
