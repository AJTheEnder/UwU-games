<?php include_once 'headerView.php'; ?>
    <div class="wrapper">
        <section class="intro">
            <h1>Shop</h1>
            <form action="./shopValidate.php" method="post" id="categoryForm">
                <select id="orderDropdown" name="order">
                    <option value="MostPopular">Most popular</option>
                    <option value="MostRecent">Most recent</option>
                    <option value="Alphabetical">Alphabetical</option>
                </select>
                <button type="submit" name="submitCategory">Go</button>
            </form>
        </section>
        <section class="gameList">
            <ul>
                <?php foreach ($gameArray as $game) { ?>
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
