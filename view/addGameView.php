<?php include_once 'headerView.php'; ?>

<?php
    if (isset($_SESSION["userid"]) === false) {
        header('location: ./login.php?from=addGame');
        exit();
    }
?>
    <div class="addGameBox">
        <section class="addgame-form">
            <h2>Sign Up</h2>
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
            <form action="./addGameValidate.php" method="post" enctype="multipart/form-data" class="">
                <input type="text" name="gameName" placeholder="Game name" class="">
                <input type="file" name="gameImage" class="gameUpload">
                <textarea name="gameDescription" placeholder="Game description" class=""></textarea>
                <input type="date" name="releaseDate" class="">
                <input type="text" name="downloadLink" placeholder="Download link" class="">
                <button type="submit" name="submit" id="gameSubmit">Add your game</button>
            </form>
        </section>
    </div>
<?php include_once 'footerView.php'; ?>
