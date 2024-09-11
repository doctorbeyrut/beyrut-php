<?php

require 'includes/init.php';

?>
<?php require 'includes/header.php'; ?>

    <div class="container-fluid">
        <h2 id="title" data-testid="title">Login test example</h2>
        <p><strong>&#x21E8; </strong><a class="link-underline-opacity-0" target="_blank" rel="noopener noreferrer" href="https://github.com/doctorbeyrut/beyrutpl-java/blob/main/src/test/java/beyrutpl/LoginTest.java">github</a></p>

        <pre>
            <p class="text-start">test script class</p>
            <code class="hljs bg-black">
            public class LoginTest extends Setup {

                @Test
                public void loginTest() {

                    HomePage home = new HomePage(driver, log);

                    home.openPage();

                    LoginPage loginPage = home.goToLoginPage();

                    loginPage.login("Test", "TESTpass");

                    Assert.assertTrue(loginPage.isLogOutButtonVisible(), "Log Out button is not visible");

                }
            }
            </code>
        </pre>

        <pre>
            <p class="text-start">page object classes</p>
            <code class="hljs bg-black">
            public class HomePage {

                protected WebDriver driver;
                protected Logger log;
                private By navLinkSelenium = By.id("selenium_btn");
                private By navLinkApi = By.id("api_btn");
                private By navLinkPhp = By.id("php_btn");
                private By navLinkLogin = By.id("login_btn");
                private String url = "http://beyrut.pl";

                public HomePage(WebDriver driver, Logger log) {
                    this.driver = driver;
                    this.log = log;
                }
                protected WebElement locate(By locator) {
                    return driver.findElement(locator);
                }
                public void openPage() {
                    log.info("Opening: " + url);
                    driver.get(url);
                }
                private void waitFor(By locator) {
                    WebDriverWait wait = new WebDriverWait(driver, Duration.ofSeconds(10));
                    wait.until(ExpectedConditions.elementToBeClickable(locator));
                }
                public void press(By locator) {
                    waitFor(locator);
                    locate(locator).click();
                }
                public void type(String text, By locator) {
                    waitFor(locator);
                    locate(locator).sendKeys(text);
                }
                public void goToSeleniumPage() {
                    press(navLinkSelenium);
                    log.info("Opening Selenium Page");
                }
                public void goToApiPage() {
                    press(navLinkApi);
                    log.info("Opening Api Page");
                }
                public void goToPhpPage() {
                    press(navLinkPhp);
                    log.info("Opening Php Page");
                }
                public LoginPage goToLoginPage() {
                    press(navLinkLogin);
                    log.info("Opening Login Page");
                    return new LoginPage(driver, log);
                }
            }

            public class LoginPage extends HomePage {

                private By usernameField = By.id("username");
                private By passwordField = By.id("password");
                private By loginBtn = By.id("loginBtn");
                private By logOutBtn = By.id("logout_btn");

                public LoginPage(WebDriver driver, Logger log) {
                    super(driver, log);
                }
                public void login(String username, String password) {
                    log.info("Logging in with user credentials");
                    type(username, usernameField);
                    type(password, passwordField);
                    press(loginBtn);
                }
                public boolean isLogOutButtonVisible() {
                    return locate(logOutBtn).isDisplayed();
                }
            }
            </code>
        </pre>

        <a class="btn btn-outline-warning btn-sm float right" id="backBtn" data-testid = "backBtn" href="/">Back</a>
    </div>

<?php require 'includes/footer.php'; ?>