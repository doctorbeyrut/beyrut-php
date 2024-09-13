<?php

require 'includes/init.php';

$conn = require 'includes/db.php';

if (isset($_GET['id'])) {

    $article = Article::getWithCategories($conn, $_GET['id'], true);

} else {
    $article = null;
}

?>
<?php require 'includes/header.php'; ?>

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

        <a class="btn btn-outline-warning btn-sm" id="backBtn" data-testid = "backBtn" href="/">Back</a>

    <?php else: ?>
        <p>No posts found.</p>
    <?php endif; ?>

<?php require 'includes/footer.php'; ?>