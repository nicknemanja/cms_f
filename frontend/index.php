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
    case 'articles':
        showArticles();
        break;
    default :
        index();
}

function index() {
    render('index');
}

function showArticles(){
    ArticleController::showArticles();
}