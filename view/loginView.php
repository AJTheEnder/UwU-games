<?php include_once 'headerView.php'; ?>
    <div class="wrapper">
        <section id="loginForm" class="formSection">
            <h2>Log In</h2>
            <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyinput") {
                        echo "<p class='errorMessage'>Please, fill in all fields</p>";
                    }
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
            <?php 
            if (isset($_GET["from"])) {
                echo '<form action="./loginValidate.php?from=$_GET["from"]" method="post" class="form">';
            }
            else {
                echo '<form action="./loginValidate.php" method="post" class="form">';
            }
            ?>
                <input type="text" name="uid" placeholder="Enter your username/email" class="textInput">
                <input type="password" name="pwd" placeholder="Enter yout password" class="textInput">
                <button type="submit" name="submit" class="button">Sign Up</button>
            </form>
        </section>
    </div>
<?php include_once 'footerView.php'; ?>
