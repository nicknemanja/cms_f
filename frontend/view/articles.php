<h1>Članci početna</h1>

<?php
$articles = isset($_REQUEST['articles']) ? $_REQUEST['articles'] : [];

var_dump("Artikli iz request:",isset($_REQUEST['articles'])?$_REQUEST['articles'] : []);
?>