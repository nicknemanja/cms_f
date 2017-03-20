<?php

class ArticleController {

    public static function insertNew($params) {
        //filtering article params from form
        foreach ($params as $key => $value) {
            if ($key !== 'content') {
                $value = htmlspecialchars($value);
            }

            $singleParam = htmlspecialchars($singleParam);
        }
        $article = new Article($params);
        if (Article::insert($article)) {
            $_SESSION['ARTICLE_CREATED'] = 'Uspjesno ste kreirali članak.';
            render('article');
            die();
        } else {
            $_SESSION['articleParams'] = $params;
            $_SESSION['ARTICLE_NOT_CREATED'] = 'Doslo je do greske prilikom upisa članka u bazu. Pokušajte ponovo.';
            $_SESSION['actionForArticle'] = 'retryInsert';
            render('article');
            die();
        }
    }

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
                    //ajax response
                    echo "Zahtjevani artikl se ne nalazi u bazi. Pokusajte ponovo.";
                    die();
                }
                $_SESSION['articleForEditing'] = $article;
                $_SESSION['actionForArticle'] = 'edit';
                render('article');
                break;
            case 'new':
                $_SESSION['actionForArticle'] = 'new';
                render('article');
                die();
                break;
            default :
                ArticleController::showArticleList();
        }
    }

}
