<?php include_once 'headerView.php'; ?>
    <div class="wrapper">
        <section class="intro">
            <h1>Shop</h1>
            <form action="./shop.php" method="post">
                <select id="categoryDropdown" name="category">
                    <option value="volvo">Most popular</option>
                    <option value="saab">Most recent</option>
                    <option value="fiat">Alphabetical</option>
                </select>
            </form>
        </section>
        <section class="gameList">
            <ul>
                <?php
                getGames($_POST['category']);
                foreach ($gameArray as $game) { ?>
                    <div>
                        <img src="<?php echo ("game" . $game['gamesId']); ?>" alt="<?php echo ("game" . $game['gamesId']); ?>">
                        <p><?php echo ($game['gamesDate']); ?></p>
                        <p><?php echo ($game['gamesVote']); ?></p>
                    </div>
                <?php } ?>
            </ul>
        </section>
        
    </div>
<?php include_once 'footerView.php'; ?>
