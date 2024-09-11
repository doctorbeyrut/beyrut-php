<?php if (! empty($article->errors)): ?>
    <ul>
        <?php foreach ($article->errors as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="post" id="formArticle">

<div class="form-group">
        <label for="title">Title</label>
        <input class="form-control" name="title" id="title" placeholder="Article title" value="<?= htmlspecialchars($article->title ?? ''); ?>">
    </div>

    <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea class="form-control" name="content" id="content" data-testid="contentField" rows="4" cols="40" placeholder="Add content"><?= htmlspecialchars($article->content ?? ''); ?></textarea>
    </div>

    <div class="mb-3">
        <label for="published_at" class="form-label">Publication date and time</label>
        <input class="form-control" type="datetime-local" min="2024-01-01T00:00" max="2025-12-31T23:59" name="published_at" id="published_at" data-testid="setDate" value="<?= htmlspecialchars($article->published_at ?? ''); ?>">
    </div>

    <fieldset>
        <legend>Categories</legend>
        
        <?php foreach ($categories as $category) : ?>
            <div class="mb-3 form-check">
                <input class="form-check-input" type="checkbox" name="category[]" value="<?= $category['id'] ?>" id="category<?= $category['id'] ?>"
                    <?php if (in_array($category['id'], $category_ids)) : ?>checked<?php endif; ?>>
                <label for="category<?= $category['id'] ?>" class="form-label"><?= htmlspecialchars($category['name']) ?></label>
            </div>
        <?php endforeach; ?>
    </fieldset>

    <button class="btn btn-outline-warning btn-sm" id="save_btn" data-id="save_btn">Save</button>

</form>