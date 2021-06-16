<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>UwU games</title>
        <link rel="stylesheet" href="/assets/css/style.css">
    </head>
    <body>
    <?php include_once 'header.php'; ?>
        <div class="signBox">
            <section class="signup-form">
                <h2>Sign Up</h2>
                <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "emptyinput") {
                            echo "<p class='errorMessage'>Please, fill in all fields</p>";
                        }
                        if ($_GET["error"] == "invaliduid") {
                            echo "<p class='errorMessage'>Choose a proper username</p>";
                        }
                        if ($_GET["error"] == "invalidemail") {
                            echo "<p class='errorMessage'>Choose a proper email</p>";
                        }
                        if ($_GET["error"] == "passwordsdontmatch") {
                            echo "<p class='errorMessage'>Passwords doesn't match</p>";
                        }
                        if ($_GET["error"] == "usernametaken") {
                            echo "<p class='errorMessage'>This username already exists</p>";
                        }
                    }
                ?>
                <form action="/includes/signup.inc.php" method="post" class="signup-form">
                    <input type="text" name="name" placeholder="Enter your name" class="signup-input">
                    <input type="email" name="email" placeholder="Enter your email" class="signup-input">
                    <input type="text" name="uid" placeholder="Enter your username" class="signup-input">
                    <input type="password" name="pwd" placeholder="Enter yout password" class="signup-input">
                    <input type="password" name="pwdRepeat" placeholder="Repeat your password" class="signup-input">
                    <button type="submit" name="submit" id="SignupSubmit">Sign Up</button>
                </form>
            </section>
        </div>
    <?php include_once 'footer.php'; ?>
