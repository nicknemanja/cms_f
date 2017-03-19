<?php

if (!isset($_SESSION)) {
    session_start();
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'init.php';

$view = isset($_GET['view']) ? filter_input(INPUT_GET, 'view') : '';

switch ($view) {

    case '':
        index();
        break;
    case 'index':
        index();
        break;
    case 'login':
        login();
        break;
    case 'logout':
        logout();
        break;
    case 'users':
        users();
        break;
    case 'menuItems':
        menuItems();
        break;
    case 'itemCategories':
        itemCategories();
        break;
    case 'articles':
        articles();
    case 'article':
        singleArticle();
        break;
    default :
        index();
}

function index() {
    //TODO "Morate biti logovani"
    UserController::login();
}

function login() {

    $username = isset($_POST['username']) ? filter_input(INPUT_POST, 'username') : '';
    $password = isset($_POST['password']) ? filter_input(INPUT_POST, 'password') : '';

    UserController::login($username, $password);
}

function logout() {
    UserController::logout();
}

function users() {
    UserController::showUsers();
}

function menuItems() {
    MenuItemController::showMenuItems();
}

function itemCategories() {
    ArticleCategoryController::showItemCategories();
}

function articles() {
    ArticleController::showArticleList();
}

function singleArticle() {
    
    $action = isset($_GET['action']) ? filter_input(INPUT_GET, 'action') : '';
    $id = isset($_GET['id']) ? filter_input(INPUT_GET, 'id') : '';

    ArticleController::showSingleArticle($action, $id);
}
