<?php include_once 'headerView.php'; ?>
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
            <form action="./signupValidate.php" method="post" class="signup-form">
                <input type="text" name="name" required placeholder="Enter your name" class="signup-input">
                <input type="email" name="email" required placeholder="Enter your email" class="signup-input">
                <input type="text" name="uid" required placeholder="Enter your username" class="signup-input">
                <input type="password" name="pwd" required placeholder="Enter yout password" class="signup-input">
                <input type="password" name="pwdRepeat" required placeholder="Repeat your password" class="signup-input">
                <button type="submit" name="submit" id="SignupSubmit">Sign Up</button>
            </form>
        </section>
    </div>
<?php include_once 'footerView.php'; ?>
