<?php
if(isset($_SESSION['LOGIN_SUCCESS'])){
    echo '<div class="errorMessageDiv">' . $_SESSION['LOGIN_SUCCESS'] . '</div>';
    unset($_SESSION['LOGIN_SUCCESS']);
}

//TODO prikazati tabelarno sa pagination-om
//$articles = Article::getList(HOMEPAGE_NUM_OF_ARTICLES);



?>



<h1>Index</h1>