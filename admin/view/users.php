<h1>Korisnici stranica</h1>

<?php
$users = isset($_SESSION['usersForShowing']) ? $_SESSION['usersForShowing'] : null;

if ($users === null) {
    echo '<div class="errorMessageDiv">' . 'Došlo je do greške prilikom prikaza korisnika' . '</div>';
}

if ($users !== null) {
    $rb = 0;
    ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>RB</th>
                <th>Ime</th>
                <th>Korisničko ime</th>
                <th>Admin</th>
                <th>Izmjeni</th>
                <th>Obrisi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $singleUser) { ?>
                <tr>
                    <td><?php echo ($rb++) ?></td>
                    <td><?php echo $singleUser->name ?></td>
                    <td><?php echo $singleUser->username ?></td>
                    <td><?php echo ($singleUser->isAdmin === '1') ? "da" : "ne  " ?></td>
                    <?php echo '<td><input type="button" value="Izmjeni" onclick="editUser(' . $singleUser->id . ')" class="btn btn-info btn-xs" ></td>' ?>
                    <?php echo '<td><input type="button" value="Obrisi" onclick="deleteUser(' . $singleUser->id . ')" class="btn btn-danger btn-xs" ></td>' ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } ?>