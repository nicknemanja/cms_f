<?php

class MenuItemController {

    static function showMenuItems() {
        render('menuItems');
    }
    
    static function getList(){
        return MenuItem::getList();
    }

}
