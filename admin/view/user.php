<?php
$action = isset($_SESSION['actionForUser']) ? $_SESSION['actionForUser'] : "";
$user = null;
$userRole = null;
$allUserRoles = UserRole::getList();
switch ($action) {
    case 'new':
        break;
    case 'edit':
        $user = isset($_SESSION['userForEditing']) ? $_SESSION['userForEditing'] : null;
        $userRole = isset($_SESSION['userRole']) ? $_SESSION['userRole'] : null;
        break;
}
?>

<form method="POST" action="index.php">
    <input type="hidden" name="action" value="<?php echo $action; ?>User">
    <div class="form-group">
        <label for="username">Korisnicko ime:</label>
        <input type="text" class="form-control" name="username" value="<?php echo ($user !== null) ? $user->username : '' ?>">
    </div>
    <div class="form-group">
        <label for="pass">Lozinka:</label>
        <input type="text" class="form-control" name="password">
    </div>
    <div class="form-group">
        <label for="pass">Ime:</label>
        <input type="text" class="form-control" name="name" value="<?php echo ($user !== null) ? $user->name : '' ?>">
    </div>
    <select class="selecetpicker" name="userTypeDescription"> 
        <?php foreach ($allUserRoles as $singleRole) { ?>
            <?php echo '<option value="' . $singleRole->description . '" >' . $singleRole->description . '</option>'; ?>
        <?php } ?>
    </select>
    <input type="submit" class="btn btn-default" value="Sačuvaj">
</form>

