<!DOCTYPE html>
<html>
    <head>
        <title>Beyrut.pl</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/default.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
        <script>hljs.highlightAll();</script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/css/styles.css">
    </head>

    <body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark bg-black sticky-top">
        <div class="container-fluid">
            <a class="navbar_custom navbar-text navbar-brand" href="/">Beyrut.pl</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-4 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" id="selenium_btn" data-testid="home_btn" href="/selenium.php">Selenium</a></li>
                    <li class="nav-item"><a class="nav-link" id="api_btn" data-testid="home_btn" href="/api.php">API</a></li>
                    <li class="nav-item"><a class="nav-link" id="php_btn" data-testid="home_btn" href="/website.php">Php</a></li>
                    <?php if (Auth::isLoggedIn()) : ?>
                        <li class="nav-item"><a class="nav-link" id="posts_btn" data-testid="admin_btn" href="/posts.php">Posts</a></li>
                        <li class="nav-item"><a class="nav-link" id="admin_btn" data-testid="admin_btn" href="/admin/">Admin</a></li>
                        <li class="nav-item"><a class="nav-link" id="logout_btn" data-testid="logout_btn" href="/logout.php">Log out</a></li>
                    <?php else : ?>
                        <li class="nav-item"><a class="nav-link" id="login_btn" data-testid="login_btn" href="/login.php">Login</a></li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
        </nav>
    <main>