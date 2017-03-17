<?php
if (isset($_SESSION['LOGOUT_SUCCESS'])) {
    echo '<div class="errorMessageDiv">' . $_SESSION['LOGOUT_SUCCESS'] . '</div>';
    unset($_SESSION['LOGOUT_SUCCESS']);
}

if (isset($_SESSION['LOGOUT_SUCCESS'])) {
    echo '<div class="errorMessageDiv">' . $_SESSION['LOGOUT_SUCCESS'] . '</div>';
    unset($_SESSION['LOGOUT_SUCCESS']);
}

if (isset($_SESSION['LOGIN_PARAMS_EMPTY'])) {
    echo '<div class="errorMessageDiv">' . $_SESSION['LOGIN_PARAMS_EMPTY'] . '</div>';
    unset($_SESSION['LOGIN_PARAMS_EMPTY']);
}

if (isset($_SESSION['MUST_BE_LOGGED_IN'])) {
    echo '<div class="errorMessageDiv">' . $_SESSION['MUST_BE_LOGGED_IN'] . isset($_SESSION['REQUESTED_PAGE']) ? ($_SESSION['REQUESTED_PAGE'] . '.php') : '' . '</div>';
    unset($_SESSION['MUST_BE_LOGGED_IN']);
}

'loginParamsEmpty'
?>
<div id="loginForm">
    <form action="index.php?view=login" method="POST">
        <div class="form-group">
            <label for="username">Korisničko ime</label>
            <input type="text" class="form-control" name="username" placeholder="Unesite korisničko ime">
        </div>
        <div class="form-group">
            <label for="password">Lozinka</label>
            <input type="password" class="form-control" name="password" aria-describedby="passwordHelp" placeholder="Unesite lozinku">
        </div>

        <button type="submit" class="btn btn-primary">Prijavite se</button>
    </form>
</div>