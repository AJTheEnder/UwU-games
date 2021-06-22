<!--
    * Created on Tue Jun 22 2021
    *
    * Copyright (c) 2021 - Mathéo G & Alex J & Jame FLC - All Right Reserved
    *
    * Licensed under the Apache License, Version 2.0
    * Available on GitHub at https://github.com/Paracetamol56/UwU-game
 -->

 <?php include_once 'headerView.php'; ?>

<?php
    if (isset($_SESSION["userid"]) === false) {
        header('location: ./login.php?from=addGame');
        exit();
    }
?>

    <div class="wrapper">
        <section id="addGameForm" class="formSection">
            <h2>Add a game</h2>
            <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyinput") {
                        echo "<p class='errorMessage'>Please, fill in all fields</p>";
                    }
                    if ($_GET["error"] == "invalidname") {
                        echo "<p class='errorMessage'>The name is invalide (only use A-Z, a-z, 0-9)</p>";
                    }
                    if ($_GET["error"] == "invalidlink") {
                        echo "<p class='errorMessage'>Invalid link</p>";
                    }
                    if ($_GET["error"] == "gameexists") {
                        echo "<p class='errorMessage'>This game already exists</p>";
                    }
                }
            ?>
            <form action="./addGameValidate.php" method="post" enctype="multipart/form-data" class="form">
                <input type="text" name="gameName" placeholder="Game name" class="textInput">
                <div class="boxInput">
                    <p>Image</p><input type="file" required name="gameImage" class="gameUpload">
                </div>
                <textarea name="gameDescription" placeholder="Game description" class="textAreaInput"></textarea>
                <input type="date" name="releaseDate" class="textInput">
                <input type="text" name="downloadLink" placeholder="Download link" class="textInput">
                <button type="submit" name="submit" class="button">Add your game</button>
            </form>
        </section>
    </div>
<?php include_once 'footerView.php'; ?>
