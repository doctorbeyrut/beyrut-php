<?php

require '../includes/init.php';

Auth::requireLogin();

$conn = require '../includes/db.php';

if (isset($_GET['id'])) {

    $article = Article::getWithCategories($conn, $_GET['id']);

} else {
    $article = null;
}

?>
<?php require '../includes/header.php'; ?>

    <?php if ($article): ?>

        <article>
            <h2 id="title" data-testid="title"><?= htmlspecialchars($article[0]['title']); ?></h2>
            
            <?php if ($article[0]['category_name']) : ?>
                <p>Categories:
                    <?php foreach ($article as $a) : ?>
                        <?= htmlspecialchars($a['category_name']); ?>
                    <?php endforeach; ?>
                </p>
            <?php endif; ?>

            <?php if ($article[0]['image_file']) : ?>
                <img src="/uploads/<?= $article[0]['image_file']; ?>">
            <?php endif; ?>

            <p id="content" data-testid="content"><?= htmlspecialchars($article[0]['content']); ?></p>
        </article>

        <?php if (Auth::isLoggedIn()): ?>

            <div class="btn-group" role="group" aria-label="Editing buttons">
            <a class="btn btn-outline-warning btn-sm" id="edit_btn" data-testid = "edit_btn" href="edit_article.php?id=<?= $article[0]['id']; ?>">Edit</a>
            <a class="btn btn-outline-warning btn-sm" id="edit_image" data-testid = "edit_image" href="edit_article_image.php?id=<?= $article[0]['id']; ?>">Edit image</a>
            <a class="btn btn-outline-warning btn-sm delete" class="delete" id="delete_btn" data-testid = "delete_btn" href="delete_article.php?id=<?= $article[0]['id']; ?>">Delete</a>
            </div>
            <a class="btn btn-outline-warning btn-sm" id="backBtn" data-testid = "backBtn" href="/admin">Back</a>

        <?php endif; ?>

    <?php else: ?>
        <p>No posts found.</p>
    <?php endif; ?>

<?php require '../includes/footer.php'; ?>