<?php

require '../includes/init.php';

Auth::requireLogin();

$conn = require '../includes/db.php';

$article = Article::getAll($conn);

?>
<?php require '../includes/header.php'; ?>

<h2>Administration</h2>

<p><a id="add_post" data-testid="add_post" href="new_article.php">Add post</a></p>

<?php if (empty($article)): ?>
    <p>No posts found.</p>
<?php else: ?>

    <table class="table table_custom table-borderless">
        <thead>
            <th>Title</th>
        </thead>
        <tbody>
        <?php $titleid = 1; ?>
        <?php foreach ($article as $post): ?>
            <tr>
                <td>                   
                    <a id="post<?php echo $titleid; ?>" data-testid="post<?php echo $titleid; ?>" href="article.php?id=<?= $post['id']; ?>"><?= htmlspecialchars($post['title']); ?></a>
                    <?php ++$titleid; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

<?php endif; ?>

<?php require '../includes/footer.php'; ?>