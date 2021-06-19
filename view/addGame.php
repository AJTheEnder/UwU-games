<?php include_once 'headerView.php'; ?>
    <div class="signBox">
        <section class="signup-form">
            <h2>Sign Up</h2>
            <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyinput") {
                        echo "<p class='errorMessage'>Please, fill in all fields</p>";
                    }
                }
            ?>
            <form action="./signupValidate.php" method="post" class="signup-form">
                <input type="text" name="gameName" placeholder="Game name" class="signup-input">
                <textarea name="gamesDescription" placeholder="Game description (supports markdown)" class="signup-input"></textarea>
                <input type="text" name="uid" placeholder="Enter your username" class="signup-input">
                <input type="password" name="pwd" placeholder="Enter yout password" class="signup-input">
                <input type="password" name="pwdRepeat" placeholder="Repeat your password" class="signup-input">
                <button type="submit" name="submit" id="SignupSubmit">Sign Up</button>
            </form>
        </section>
    </div>
<?php include_once 'footerView.php'; ?>
