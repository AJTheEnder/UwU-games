<!--
    * Created on Tue Jun 22 2021
    *
    * Copyright (c) 2021 - Mathéo G & Alex J & Jame FLC - All Right Reserved
    *
    * Licensed under the Apache License, Version 2.0
    * Available on GitHub at https://github.com/Paracetamol56/UwU-game
 -->

 <?php include_once 'headerView.php'; ?>
    <div class="wrapper">
        <section id="signupForm" class="formSection">
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
            <form action="./signupValidate.php" method="post" class="form">
                <input type="text" name="name" placeholder="Enter your name" class="textInput">
                <input type="email" name="email" placeholder="Enter your email" class="textInput">
                <input type="text" name="uid" placeholder="Enter your username" class="textInput">
                <input type="password" name="pwd" placeholder="Enter yout password" class="textInput">
                <input type="password" name="pwdRepeat" placeholder="Repeat your password" class="textInput">
                <button type="submit" name="submit" class="button">Sign Up</button>
            </form>
        </section>
    </div>
<?php include_once 'footerView.php'; ?>
