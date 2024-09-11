<?php

require 'includes/init.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conn = require 'includes/db.php';

    if (User::authenticate($conn, $_POST['username'], $_POST['password'])) {

        Auth::login();

        Url::redirect('/');

    } else {

        $error = "login incorrect";

    }
}

?>
<?php require 'includes/header.php'; ?>

<h2>Login</h2>

<?php if (! empty($error)) : ?>
    <p><?= $error ?></p>
<?php endif; ?>

<form method="post">
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input class="form-control" id="username" data-testid="username" type="text" name="username">
    </div>
    
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input class="form-control" id="password" data-testid="password" type="password" name="password">
    </div>

    <button id="loginBtn" data-testid="loginBtn" class="btn btn-outline-warning btn-sm">Log in</button>

</form>

<?php require 'includes/footer.php'; ?>