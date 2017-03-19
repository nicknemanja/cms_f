<?php
if (isset($_SESSION['LOGOUT_SUCCESS'])) {
    echo '<div class="errorMessageDiv">' . $_SESSION['LOGOUT_SUCCESS'] . '</div>';
    unset($_SESSION['LOGOUT_SUCCESS']);
}
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