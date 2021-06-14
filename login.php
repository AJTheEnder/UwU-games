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
                <h2>Log In</h2>
                <div class="login-form">
                    <form action="login.inc.php" method="post">
                        <input type="text" name="name" placeholder="Enter your username/email">
                        <input type="password" name="pwd" placeholder="Enter yout password">
                        <button type="submit" name="submit">Sign Up</button>
                    </form>
                </div>
            </section>
        </div>
    <?php include_once 'footer.php'; ?>
