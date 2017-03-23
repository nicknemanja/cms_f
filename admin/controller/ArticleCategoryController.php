<?php

class ArticleCategoryController {

    static function showItemCategories() {
        render('articleCategories');
    }
    
    static function getList(){
        return ArticleCategory::getList();
    }
    
    

}
