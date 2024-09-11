<?php

require 'includes/init.php';

?>
<?php require 'includes/header.php'; ?>

    <div class="container-fluid">
        <h2 id="title" data-testid="title">Postman test scripts</h2>
        <p><strong>&#x21E8; </strong><a class="link-underline-opacity-0" target="_blank" rel="noopener noreferrer" href="https://github.com/doctorbeyrut">github</a></p>

        <pre>
            <p class="text-start">create comment test</p>
            <code class="hljs bg-black">
                POST https://api.github.com/repos/doctorbeyrut/beyrut-php/issues/1/comments

                    pm.test("Status code check", () => {
                    pm.expect(pm.response.code).to.eql(201);
                    })
                    pm.test("Response body parameters check", () => {
                    const responseJson = pm.response.json();
                    pm.expect(responseJson.body).to.eql("New comment");
                    })
            </code>
        </pre>

        <pre>
            <p class="text-start">update issue test</p>
            <code class="hljs bg-black">
                PATCH https://api.github.com/repos/doctorbeyrut/beyrut-php/issues/1

                    pm.test("Status code check", () => {
                    pm.expect(pm.response.code).to.eql(200);
                    })

                    pm.test("Response parameters check", () => {
                    const responseJson = pm.response.json();
                    pm.expect(responseJson.body).to.eql("Updated");
                    pm.expect(responseJson.number).to.eql(1);
                    pm.expect(responseJson.state).to.eql("open");
                    })
            </code>
        </pre>

        <a class="btn btn-outline-warning btn-sm float right" id="backBtn" data-testid = "backBtn" href="/">Back</a>
    </div>

<?php require 'includes/footer.php'; ?>