<?php



class ArticleController {

    public static function showArticleList() {
        $articles = ArticleController::getList();
        $_SESSION['articles'] = $articles;
        render("articles");
    }

    public static function getList() {
        return Article::getList();
    }

}
