<?php
if(isset($_SESSION['LOGIN_SUCCESS'])){
    echo '<div class="errorMessageDiv">' . $_SESSION['LOGIN_SUCCESS'] . '</div>';
    unset($_SESSION['LOGIN_SUCCESS']);
}
?>

<h1>Index</h1>