<?php

require '../includes/init.php';

Auth::requireLogin();

$conn = require '../includes/db.php';

if (isset($_GET['id'])) {

    $article = Article::getById($conn, $_GET['id']);
    
    if (! $article) {
        die("article not found");
    }

} else {
    die("article not found, missing id");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $previous_image = $article->image_file;

    if ($article->setImageFile($conn, null)) {
        if ($previous_image) {
            unlink("../uploads/$previous_image");
        }
        Url::redirect("/admin/edit_article_image.php?id={$article->id}");
    }
}   

?>
<?php require '../includes/header.php'; ?>

<h2>Delete article image</h2>

<?php if ($article->image_file) : ?>
                <img src="/uploads/<?= $article->image_file; ?>">
<?php endif; ?>

<form method="post" enctype="multipart/form-data">

    <p>Are you sure?</p>

    <button class="btn btn-primary" id="del_image" data-testid="del_image">Delete</button>
    <a id="cancel_btn" data-testid="cancel_btn" href="edit_article_image.php?id=<?= $article->id; ?>">Cancel</a>
    
</form>


<?php require '../includes/footer.php'; ?>