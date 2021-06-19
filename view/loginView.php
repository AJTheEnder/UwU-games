<?php include_once 'headerView.php'; ?>
    <div class="wrapper">
        <section class="signup-form">
            <h2>Log In</h2>
            <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "wronglogin") {
                        echo "<p class='errorMessage'>Wrong login or password</p>";
                    }
                }
                if (isset($_GET["from"])) {
                    if ($_GET["from"] == "addGame") {
                        echo "<p class='fromMessage'>You must login before acces this page</p>";
                    }
                }
            ?>
            <div class="login-form">
                <?php 
                if (isset($_GET["from"])) {
                    echo '<form action="./loginValidate.php?from=$_GET["from"]" method="post">';
                }
                else {
                    echo "<form action='./loginValidate.php' method='post'>";
                }
                ?>
                    <input type="text" name="uid" placeholder="Enter your username/email">
                    <input type="password" name="pwd" placeholder="Enter yout password">
                    <button type="submit" name="submit">Sign Up</button>
                </form>
            </div>
        </section>
    </div>
<?php include_once 'footerView.php'; ?>
