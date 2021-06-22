<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>UwU games</title>
        <link rel="stylesheet" href="/assets/css/style.css">
    </head>
    <body>
        <nav id="navBar">
            <div class="navBox">
                <img src="assets\img\UWU_Logo_Light.png" alt="Logo" class="UwU_Logo">
                <ul class="PageList">
                    <li class="PageLink">
                        <a href="shop.php">Shop</a>
                    </li>
                    <li class="PageLink">
                        <a href="addGame.php">Add Game</a>
                    </li>
                    <?php
                        session_start();
                        if (isset($_SESSION["useruid"])) {
                            echo '<li class="PageLink"><a href="profile.php">Profile</a></li>';
                            echo '<li class="PageLink"><a href="logout.php">Log out</a></li>';
                        }
                        else {
                            echo '<li class="PageLink"><a href="signup.php">Sign up</a></li>';
                            echo '<li class="PageLink"><a href="login.php">Log in</a></li>';
                        }
                    ?>
                </ul>
            </div>
        </nav>
