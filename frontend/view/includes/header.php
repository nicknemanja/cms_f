<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>
            <?php
            if (!isset($_SESSION)) {
                session_start();
            }

            require 'init.php';

            error_reporting(E_ALL);
            ini_set('display_errors', 1);
            ?>
        </title>
        <!-- -----------------------------------------CSS------------------------------------------------->  
        <link rel="stylesheet" href="extra/css/style.css">


        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
              crossorigin="anonymous">


        <!-- ---------------------------------------JavaScript-----------------------------------------  -->

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
        crossorigin="anonymous"></script>
    </head>
    <body>

        <div class="container-fluid" id="mainMenu">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="index.php">Logo</a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li><a href = "index.php">Početna</a></li>
                        <li><a href = "index.php?view=articles">Clanci</a></li>
                        <li><a href = "index.php?view=contact">Kontakt</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href = "../admin/index.php?view=login"><span class = "glyphicon glyphicon glyphicon glyphicon-user"></span>Admin</a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="container-fluid" id="mainContentDiv">