<?php

$article = isset($_SESSION['articleForEditing']) ? $_SESSION['articleForEditing'] : null;

if ($article === null) {
    render('article');
}

?>


<form method="POST" action="index.php?view=article&action=updated">
    <input type="hidden" name ="id" value=" <?php $article->id ?> ">
  <div class="form-group">
    <label for="title">Naslov:</label>
    <input type="text" class="form-control" id="title" name="title">
  </div>
  <div class="form-group">
    <label for="content">Sadrzaj:</label>
    <input type="text" class="form-control" id="content" name="content">
  </div>
  <button type="submit" class="btn btn-default">Izmjeni</button>
</form>