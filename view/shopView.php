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
        <section class="intro">
            <h1>Shop</h1>
            <form action="" method="post" id="categoryForm">
                <select id="orderDropdown" name="order">
                    <option value="MostPopular">Most popular</option>
                    <option value="MostRecent">Most recent</option>
                    <option value="Alphabetical">Alphabetical</option>
                </select>
                <input type="text" name="search" placeholder="Search by name" class="textInput">
                <button type="submit" name="submitCategory">Go</button>
            </form>
        </section>
        <section class="gameList">
            <ul>
                <?php
                    if (isset($_POST['submitCategory'])) {
                        $category = $_POST['order'];
                        $search = $_POST['search'];
                
                        require_once __DIR__ . '/../db/dbh.php';
                        
                        $gameArray = getGames($dbh, $category, $search);
                    }
                    if (empty($gameArray)) {
                        echo "<p class='errorMessage'>No result found</p>";
                    }
                    foreach ($gameArray as $game) { ?>
                    <div class="gameListItem">
                        <div class="imagePreview" style="background-image: url(<?php echo ("/assets/img/upload/game/game" . $game['gamesId'] . ".png"); ?>);"></div>
                        <div class="textPreview">
                            <p class="gameName"><?php echo ($game['gamesName']); ?></p>
                            <p class="gameDate"><span class="pink">Release date :</span> <?php echo ($game['gamesDate']); ?></p>
                            <p class="gameDescription"><span class="pink">Downloads :</span> <?php echo ($game['gamesDownloads']); ?></p>
                            <div class="button">
                                <a href="./game.php?id=<?php echo ($game['gamesId']); ?>">View more</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </ul>
        </section> 
    </div>
<?php include_once 'footerView.php'; ?>
