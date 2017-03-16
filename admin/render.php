<?php

if (!isset($_SESSION)) { session_start(); }

require 'view/includes/header.php';

require 'view/' . $_GET['view'] . '.php';

require 'view/includes/footer.php';
