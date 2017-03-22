<?php

if (!isset($_SESSION)) {
    session_start();
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'init.php';

$view = isset($_GET['view']) ? filter_input(INPUT_GET, 'view') : '';

$actionFromPost = isset($_POST['action']) ? filter_input(INPUT_POST, 'action') : '';

switch ($actionFromPost) {
    case 'insertNewArticle':
        insertNewArticle();
        break;
    case 'insertNewUser':
        insertNewUser();
        break;
    default :
}

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
    case 'user':
        singleUser();
        break;
    case 'menuItems':
        menuItems();
        break;
    case 'itemCategories':
        itemCategories();
        break;
    case 'articles':
        articles();
        break;
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

function singleUser() {
    var_dump("Poziv metode singleUser() u index.php");
    $action = isset($_GET['action']) ? filter_input(INPUT_GET, 'action') : '';
    $id = isset($_GET['id']) ? filter_input(INPUT_GET, 'id') : '';
    UserController::showSingleUser($action, $id);
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

//functions for $_POST
function insertNewArticle() {
    //podaci u $_POST
    $title = isset($_POST['title']) ? filter_input(INPUT_POST, 'title') : '';
    $content = isset($_POST['content']) ? filter_input(INPUT_POST, 'content') : '';
    $params = [];
    $params['title'] = $title;
    $params['content'] = $content;
    ArticleController::insertNew($params);
}

function insertNewUser() {
    $username = isset($_POST['username']) ? filter_input(INPUT_POST, 'username') : '';
    $name = isset($_POST['name']) ? filter_input(INPUT_POST, 'name') : '';
    $password = isset($_POST['password']) ? filter_input(INPUT_POST, 'password') : '';
    $userTypeDescription = isset($_POST['userTypeDescription']) ? filter_input(INPUT_POST, 'userTypeDescription') : '';

    $params = [];

    $params['username'] = $username;
    $params['name'] = $name;
    $params['password'] = $password;
    $params['userTypeDescription'] = $userTypeDescription;

    UserController::
}
