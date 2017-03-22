<?php
$action = isset($_SESSION['actionForArticle']) ? $_SESSION['actionForArticle'] : '';
$article = null;
$title = null;
$content = null;
$params = null;

if (isset($_SESSION['ARTICLE_CREATED'])) {
    echo '<div class="errorMessageDiv">' . $_SESSION['ARTICLE_CREATED'] . '</div>';
    unset($_SESSION['ARTICLE_CREATED']);
}

if (isset($_SESSION['ARTICLE_NOT_CREATED'])) {
    echo '<div class="errorMessageDiv">' . $_SESSION['ARTICLE_NOT_CREATED'] . '</div>';
    unset($_SESSION['ARTICLE_NOT_CREATED']);
}

switch ($action) {
    case 'edit':
        echo '<h1>Izmjena članka</h1>';
        if (isset($_SESSION['articleForEditing'])) {
            $article = $_SESSION['articleForEditing'];
            unset($_SESSION['articleForEditing']);
            $title = $article->title;
            $content = $article->content;
        }
        break;
    case 'new':
        echo '<h1>Novi članak</h1>';
        break;
    case 'retryInsert':
        $params = isset($_SESSION['articleParams']) ? $_SESSION['articleParams'] : null;
        $title = $params['title'];
        $content = $params['content'];
        break;
}

Prilikom dodavanja clanaka dodati i selekt box koji ce prikazivati kategorija clanaka
pa prilikom unosa pokupiti i odabranu kategoriju i upisati u bazu.

?>



<form method="POST" action="index.php?action=insertNewArticle">
    <input type="hidden" name="action" value="insertNewArticle">
    <div class="form-group">
        <label for="title">Naslov:</label>
        <input type="text" class="form-control" name="title" value="<?php echo ($title !== null) ? $title : '' ?>">
    </div>
    <div class="form-group">
        <label for="content">Sadržaj:</label>
        <textarea class="ckeditor" name="content"><?php echo ($content !== null) ? $content : '' ?></textarea>
    </div>
    <input type="submit" class="btn btn-default" value="Sačuvaj">
</form>