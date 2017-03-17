<?php

class ArticleController {

    public static function showArticles() {
        $articles = ArticleController::getList();

        var_dump("artikli na kontroleru", $articles);
        die();
        $_REQUEST['articles'] = $articles;
        render("articles");
    }

    public static function getList() {
        $list = Article::getList();
        return $list;
    }

}
