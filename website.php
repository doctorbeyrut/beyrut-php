<?php

require 'includes/init.php';

?>
<?php require 'includes/header.php'; ?>

    <div class="container-fluid">
        <h2 id="title" data-testid="title">Website code</h2>
        <p><strong>&#x21E8; </strong><a class="link-underline-opacity-0" target="_blank" rel="noopener noreferrer" href="https://github.com/doctorbeyrut/beyrut-php/blob/main/index.php">github</a></p>

        <pre>
            <p class="text-start">php</p>
            <code class="hljs bg-black">
                <?php
                $code = '<?php

                require includes/init.php;

                $conn = require includes/db.php;

                if (isset($_GET[id])) {

                    $article = Article::getWithCategories($conn, $_GET[id], true);

                } else {
                    $article = null;
                }
                ?>
                <?php require includes/header.php; ?>

                    <?php if ($article): ?>

                        <article>
                            <h2 id="title" data-testid="title"><?= htmlspecialchars($article[0][title]); ?></h2>
                            
                            <?php if ($article[0][category_name]) : ?>
                                <p>Categories:
                                    <?php foreach ($article as $a) : ?>
                                        <?= htmlspecialchars($a[category_name]); ?>
                                    <?php endforeach; ?>
                                </p>
                            <?php endif; ?>

                            <?php if ($article[0][image_file]) : ?>
                                <img src="/uploads/<?= $article[0][image_file]; ?>">
                            <?php endif; ?>

                            <p id="content" data-testid="content"><?= htmlspecialchars($article[0][content]); ?></p>
                        </article>

                        <a class="btn btn-outline-warning btn-sm" id="backBtn" data-testid = "backBtn" href="/">Back</a>

                    <?php else: ?>
                        <p>No posts found.</p>
                    <?php endif; ?>';

                echo '<pre>' . htmlspecialchars($code) . '</pre>';
                ?>
                </code>
        </pre>

        <pre>
            <p class="text-start">html</p>
            <code class="hljs bg-black">
            <?php
        $code = '<!DOCTYPE html>
        <html>
            <head>
                <title>Beyrut.pl</title>
                <meta charset="utf-8">
            </head>
        <body>
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg navbar-dark bg-black sticky-top">
                <div class="container-fluid">
                    <a class="navbar_custom navbar-text navbar-brand" href="/">Beyrut.pl</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">            
                    </span>
                    </button>
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
            <div class="container-fluid">
                <ul id="index">
                        <li>
                            <h2 class="h2"><a class="link-underline-dark link-underline-opacity-0" id="selenium_link" data-testid="selenium_link" href="selenium.php">Selenium</a></h2>
                            <p>Sample code for frontend test automation</p>
                        </li>
                        <li>
                            <h2 class="h2"><a class="link-underline-dark link-underline-opacity-0" id="api_link" data-testid="api_link" href="api.php">Api</a></h2>
                            <p>Sample code for API testing</p>
                        </li>
                        <li>
                            <h2 class="h2"><a class="link-underline-dark link-underline-opacity-0" id="php_link" data-testid="php_link" href="website.php">Php</a></h2>
                            <p>Sample code used on this website</p>
                        </li>
                </ul>
            </div>
            </main>
            </div>
        </body>
        </html>';
            echo '<pre>' . htmlspecialchars($code) . '</pre>';
            ?>
            </code>
        </pre>

        <a class="btn btn-outline-warning btn-sm float right" id="backBtn" data-testid = "backBtn" href="/">Back</a>
    </div>

<?php require 'includes/footer.php'; ?>