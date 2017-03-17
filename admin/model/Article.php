<?php

class Article {

    //parameters

    public function __construct($params = array()) {
        //if (isset($params['id']){
        // $this->id = (int)$params['id'];
        //}
    }

    public static function getList($limit = 10, $order = 'ASC') {
        $pdo = DB_Pdo::getPdoConnection();
        //TODO Nastaviti rad
        $stmt = $pdo->prepare(Article::$SELECT_LIST);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':order', $order, PDO::PARAM_STR);

        $stmt->execute();

        var_dump($stmt->fetchAll());
        echo 'Article model getList()';
        die();
    }

    static $LIMIT = 10;
    static $SELECT_LIST = "SELECT * FROM user LIMIT :limit ORDER BY id :order";

}
