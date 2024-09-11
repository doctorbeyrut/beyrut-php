<!DOCTYPE html>
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
</html>