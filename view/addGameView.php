<?php include_once 'headerView.php'; ?>

<?php
    if (isset($_SESSION["userid"]) === false) {
        header('location: ./login.php?from=addGame');
        exit();
    }
?>
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
            <form action="./signupValidate.php" method="post" class="">
                <input type="text" name="gameName" placeholder="Game name" class="">
                <textarea name="gamesDescription" placeholder="Game description (supports markdown)" class=""></textarea>
                <input type="text" name="uid" placeholder="Enter your username" class="">
                <input type="password" name="pwd" placeholder="Enter yout password" class="">
                <input type="password" name="pwdRepeat" placeholder="Repeat your password" class="">
                <button type="submit" name="submit" id="SignupSubmit">Sign Up</button>
            </form>
        </section>
    </div>
<?php include_once 'footerView.php'; ?>
