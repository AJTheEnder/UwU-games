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
            ?>
            <div class="login-form">
                <form action="/includes/login.inc.php" method="post">
                    <input type="text" name="uid" placeholder="Enter your username/email">
                    <input type="password" name="pwd" placeholder="Enter yout password">
                    <button type="submit" name="submit">Sign Up</button>
                </form>
            </div>
        </section>
    </div>
<?php include_once 'footerView.php'; ?>
