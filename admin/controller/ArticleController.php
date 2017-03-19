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

    public static function getById($id) {
        return Article::getById($id);
    }

    public static function showSingleArticle($action = '', $id = '') {
        switch ($action) {
            case 'delete':
                if (Article::deleteById($id)) {
                    echo "Uspjesno ste obrisali artikl!";
                } else {
                    echo "Brisanje artikla nije uspjelo. Pokusajte ponovo.";
                }
                break;
            case 'edit':
                $article = ArticleController::getById($id);
                if ($article === null) {
                    echo "Zahtjevani artikl se ne nalazi u bazi. Pokusajte ponovo.";
                    die();
                }
                $_SESSION['articleForEditing'] = $article;
                render('article');
                break;
            default :
                ArticleController::showArticleList();
        }
    }

}
