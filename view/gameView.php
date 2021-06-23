<!--
    * Created on Tue Jun 22 2021
    *
    * Copyright (c) 2021 - Mathéo G & Alex J & Jame FLC - All Right Reserved
    *
    * Licensed under the Apache License, Version 2.0
    * Available on GitHub at https://github.com/Paracetamol56/UwU-games
 -->

<!-- Includer header (navBar & begining tags) -->
<?php include_once 'headerView.php'; ?>

    <div class="wrapper">
        <section class="gameSection">
            <h1><?php echo($game['gamesName']) ?></h1>
            <div class="gameItemPicture">
                <div class="gameItemList">
                    <p class="gameItem"><span class="pink">Delease date : </span><?php echo($game['gamesDate']) ?></p>
                    <p class="gameItem"><span class="pink">Downloads : </span><?php echo($game['gamesDownloads']) ?></p>
                    <p class="gameItem"><span class="pink">Creator : </span><?php echo($game['gamesCreator']) ?></p>
                    <?php if(isset($_SESSION['userid'])) { ?>
                        <div class='button'>
                            <a href="<?php echo("./gameDownload.php?id=" . $_GET['id']); ?>" target="_blank">Download</a>
                        </div>
                    <?php } ?>
                </div>
                <div class="gamePicture" style="background-image: url(<?php echo ("/assets/img/upload/game/game" . $game['gamesId'] . ".png"); ?>);"></div>
            </div>
            <p calss="gameDescription"><span class="pink">Description : </span><?php echo($game['gamesDescription']) ?></p>
            <?php
                if(isset($_SESSION['useruid'])) {
                    if($_SESSION['useruid'] === $game['gamesCreator']) {
                        echo("<div class='button'>");
                            echo("<a href='./deleteGame.php?id=" . $game['gamesId'] . "' target='_blank'>Delete game</a>");
                        echo("</div>");
                    }
                }
            ?>
        </section>
    </div>

<!-- Includer footer (closing tags) -->
<?php include_once 'footerView.php'; ?>
