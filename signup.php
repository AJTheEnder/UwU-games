<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>UwU games</title>
        <link rel="stylesheet" href="/assets/css/style.css">
    </head>
    <body>
    <?php include_once 'header.php'; ?>
        <div class="wrapper">
            <section class="signup-form">
                <h2>Sign Up</h2>
                <div class="signup-form">
                    <form action="signup.inc.php" method="post">
                        <input type="text" name="name" placeholder="Enter your name">
                        <input type="email" name="email" placeholder="Enter your email">
                        <input type="text" name="uid" placeholder="Enter your username">
                        <input type="password" name="pwd" placeholder="Enter yout password">
                        <input type="password" name="pwdRepeat" placeholder="Repeat your password">
                        <button type="submit" name="submit">Sign Up</button>
                    </form>
                </div>
            </section>
        </div>
    <?php include_once 'footer.php'; ?>
