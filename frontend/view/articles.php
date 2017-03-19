<h1>Članci početna</h1>

<?php
$articles = isset($_SESSION['articles']) ? $_SESSION['articles'] : [];
?>
<div id="tableArticles">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>RB</th>
                <th>Naslov</th>
                <th>Sadrzaj</th>
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
                </tr>

            <?php } ?> 

        </tbody>
    </table>
</div>