<?php
if (!isset($_SESSION)) {
    session_start();
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'init.php';

$view = isset($_GET['view']) ? $_GET['view'] : '';

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
    case 'articles':
        articles();
        break;
    default :
        index();
}

function index() {
    //TODO "Morate biti logovani"
    UserController::login();
    render('login');
}

function login() {

    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    UserController::login($username, $password);
}

function logout() {
    UserController::logout();
}

function articles() {
    ArticleController::showArticles();
}
