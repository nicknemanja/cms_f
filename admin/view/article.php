<?php
$action = isset($_SESSION['actionForArticle']) ? $_SESSION['actionForArticle'] : '';
$categoryList = isset($_SESSION['articleCategories']) ? $_SESSION['articleCategories'] : null;
$menuItemList = isset($_SESSION['menuItemList']) ? $_SESSION['menuItemList'] : null;



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

if (isset($_SESSION['ARTICLE_EDITED'])) {
    echo '<div class="errorMessageDiv">' . $_SESSION['ARTICLE_EDITED'] . '</div>';
    unset($_SESSION['ARTICLE_EDITED']);
}

if (isset($_SESSION['ARTICLE_NOT_EDITED'])) {
    echo '<div class="errorMessageDiv">' . $_SESSION['ARTICLE_NOT_EDITED'] . '</div>';
    unset($_SESSION['ARTICLE_NOT_EDITED']);
}

switch ($action) {
    case 'edit':
        if (isset($_SESSION['articleForEditing'])) {
            $article = (object) $_SESSION['articleForEditing'];
            
            unset($_SESSION['articleForEditing']);
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

?>



<form method="POST" action="index.php">
    <input type="hidden" name="action" value="<?php echo $action; ?>Article">
    <div class="form-group">
        <label for="category">Kategorija:</label>
        <select name="category" class="selecetpicker">
            <?php
            if ($categoryList !== null) {
                foreach ($categoryList as $category) {
                    echo '<option '.(($category->id == $article->idArticleCategory) ? 'selected="selected"' : '').' value="' . $category->id . '" >' . $category->title . '</option>';
                }
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="menuItem">Meni stavka:</label>
        <select name="menuItem" class="selecetpicker">
            <?php
            if ($menuItemList !== null) {
                foreach ($menuItemList as $menuItem) {
                    echo '<option ' . (($menuItem->id == $article->idMenuItem) ? 'selected="selected"' : '') . 'value="' . $menuItem->id . '">' . $menuItem->title . '</option>';
                }
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="title">Naslov:</label>
        <input type="text" class="form-control" name="title" value="<?php echo ($article !== null) ? $article->title : '' ?>">
    </div>
    <div class="form-group">
        <label for="content">Sadržaj:</label>
        <textarea class="ckeditor" name="content"><?php echo ($article !== null) ? $article->content : '' ?></textarea>
    </div>
    <div class="form-group">
        <label for="isShown">Prikazan:</label>
        <select name="isShown" class="selecetpicker">
            <option value="1">Da</option>
            <option value="0">Ne</option>
        </select>
    </div>

    <input type="submit" class="btn btn-default" value="Sačuvaj">
</form>