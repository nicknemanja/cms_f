<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>
            <?php
            require 'init.php';

            error_reporting(E_ALL);
            ini_set('display_errors', 1);

            if (!isset($_SESSION)) {
                session_start();
            }
            ?>
        </title>

        <!-- -----------------------------------------CSS------------------------------------------------->  
        <link rel="stylesheet" href="extra/css/style.css">


        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
              crossorigin="anonymous">


        <!-- ---------------------------------------JavaScript-----------------------------------------  -->
        <script src="https://code.jquery.com/jquery-3.2.0.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
        crossorigin="anonymous"></script>

        <script src="js/functionsArticle.js"></script>

        <script src="../ckeditor/ckeditor.js"></script>

    </head>
    <body>

        <div class="container-fluid" id="mainMenu">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="index.php?view=index">Početna</a>
                    </div>
                    <ul class="nav navbar-nav">
                        <?php if (User::isLoggedIn()) { ?>
                            <li><a href = "index.php?view=users"><span class = "glyphicon glyphicon glyphicon-user"></span>Korisnici</a></li>
                            <li><a href = "index.php?view=menuItems"><span class = "glyphicon glyphicon glyphicon-user"></span>Meni stavke</a></li>
                            <li><a href = "index.php?view=itemCategories"><span class = "glyphicon glyphicon-folder-close"></span>Kategorije clanaka</a></li>
                            <li><a href = "index.php?view=articles"><span class = "glyphicon glyphicon-file"></span>Clanci</a></li>
                        <?php } procitati meni item-e iz baze i prikazati ovdje..ako ima vise od dvije
                                prikazati padajuci meni sa nazivom ostale meni stavke ili ih prikazati u padajucem meniju>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <?php if (!User::isLoggedIn()) { ?>
                            <li><a href = "index.php?view=login"><span class = "glyphicon glyphicon-log-in"></span>Prijava</a></li>
                        <?php } else { ?>
                            <li><a href = "index.php?view=logout"><span class = "glyphicon glyphicon-log-in"></span>Odjava</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="container-fluid" id="mainContentDiv">