<h1>Članci početna</h1>

<div id="ajaxMessages" class="errorMessageDiv"></div>

<form action="index.php" method="get">
    <input type="hidden" name="view" value="article">
    <input type="hidden" name="action" value="new">
    <input type="submit" class="btn btn-success" value="Novi clanak"/> 
</form>

<?php
if (isset($_SESSION['ARTICLE_DELETED'])) {
    echo '<div class="errorMessageDiv">' . $_SESSION['ARTICLE_DELETED'] . '</div>';
    unset($_SESSION['ARTICLE_DELETED']);
}

$articles = isset($_SESSION['articles']) ? $_SESSION['articles'] : [];
?>

<div class="errorMessageDiv" id="ajaxMessages"></div>

<div id="tableArticles">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>RB</th>
                <th>Naslov</th>
                <th>Sadrzaj</th>
                <th>Kategorija</th>
                <th>Meni stavka</th>
                <th>Izmjeni</th>
                <th>Obrisi</th>
            </tr>
        </thead>

        <tbody>

            <?php
            $rb = 1;
            foreach ($articles as $singleArticle) {
                ?>
                <tr>
                    <td><?php echo $rb++ ?></td>
                    <td><?php echo $singleArticle->title ?></td>
                    <td><?php echo $singleArticle->content ?></td>
                    <td><?php echo $singleArticle->articleCategory ?></td>
                    <td><?php echo $singleArticle->menuItem ?></td>
                    <?php echo '<td><a href="index.php?view=article&action=edit&id=' . $singleArticle->id . '">Izmjeni</a></td>' ?>
                    <?php echo '<td><button onclick=deleteArticle(' . $singleArticle->id . ') class="btn btn-danger btn-xs">Obrisi</button></td>' ?>
                </tr>

            <?php } ?> 

        </tbody>
    </table>
</div>

