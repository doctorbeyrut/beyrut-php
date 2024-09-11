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
                show_source("sample.php");
                ?>
            </code>
        </pre>

        <pre>
            <p class="text-start">html</p>
            <code class="hljs bg-black">
                <?php
                show_source("html_sample.php");
                ?>
            </code>
        </pre>

        <a class="btn btn-outline-warning btn-sm float right" id="backBtn" data-testid = "backBtn" href="/">Back</a>
    </div>

<?php require 'includes/footer.php'; ?>