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

    try {

        if (empty($_FILES)) {
            throw new Exception('Invalid file uploaded');
        }

        switch ($_FILES['file']['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new Exception('No file uploaded');
                break;
            case UPLOAD_ERR_INI_SIZE:
                throw new Exception('Maximum file size is 4MB');
                break;
            default:
                throw new Exception('An error occurred');
        }

        if ($_FILES['file']['size'] > 2000000) {
            throw new Exception('File is too large');
        }

        $mime_types = ['image/gif', 'image/png', 'image/jpg', 'image/jpeg'];
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime_type = finfo_file($finfo, $_FILES['file']['tmp_name']);

        if (! in_array($mime_type, $mime_types)) {
            throw new Exception('Invalid file type');
        }

        $pathinfo = pathinfo($_FILES["file"]["name"]);
        $base = $pathinfo['filename'];
        $base = preg_replace('/[^a-zA-Z0-9_-]/', '_', $base);
        $base = mb_substr($base, 0, 200);
        $filename = $base . "." . $pathinfo['extension'];
        $destination = "../uploads/$filename";

        $i = 1;
        while (file_exists($destination)) {
            $filename = $base . "-$i." . $pathinfo['extension'];
            $destination = "../uploads/$filename";
            $i++;
        }
        
        if (move_uploaded_file($_FILES['file']['tmp_name'], $destination)) {

            $previous_image = $article->image_file;

            if ($article->setImageFile($conn, $filename)) {
                if ($previous_image) {
                    unlink("../uploads/$previous_image");
                }
                Url::redirect("/admin/edit_article_image.php?id={$article->id}");
            }
        } else {
            throw new Exception('Unalbe to upload file');
        }

    } catch (Exception $e) {
        $error = $e->getMessage();
    }
      
}    

?>
<?php require '../includes/header.php'; ?>

<h2>Edit article image</h2>

<?php if ($article->image_file) : ?>
    <img src="/uploads/<?= $article->image_file; ?>">
    <a class="delete btn btn-outline-warning btn-sm" id="del_img" data-testid="del_img" href="delete_article_image.php?id=<?= $article->id; ?>">Delete</a>
<?php endif; ?>

<?php if (isset($error)) : ?>
    <p><?= $error ?></p>
<?php endif; ?>

<form method="post" enctype="multipart/form-data">

    <div class="mb-3">
        <label class="form-label" for="file">Insert file</label>
        <input class="form-control" type="file" name="file" id="file_upl">
    </div>

        <button class="btn btn-outline-warning btn-sm" id="upload_btn" data-testid="upload_btn">Upload</button>
        <a class="btn btn-outline-warning btn-sm" id="cancel_btn" data-testid="cancel_btn" href="article.php?id=<?= $article->id; ?>">Cancel</a>

</form>


<?php require '../includes/footer.php'; ?>