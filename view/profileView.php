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
        <section class="profileSection">
            <?php 
                // Avatar display
                if(file_exists("assets/img/upload/avatar/avatar" . $_SESSION["userid"] . ".png")) {
                   $image = "assets/img/upload/avatar/avatar" . $_SESSION["userid"] . ".png";
                }
                else {
                    $image = "assets/img/upload/avatar/avatarDefault.png";
                }
            ?>
            <img src="<?php echo($image)?>" alt="avatar" class="avatar" height="200px" width="200px">
            <?php echo("<h2>Hello " . $resultData['usersName'] . "</h2>"); ?>
            <table class="infoTable">
                <tbody>
                    <tr>
                        <td class="infoName">Username</td>
                        <td class="infoValue"><?php echo ($resultData['usersUid']); ?></td>
                    </tr>
                    <tr>
                        <td class="infoName">Full name</td>
                        <td class="infoValue"><?php echo ($resultData['usersName']); ?></td>
                    </tr>
                    <tr>
                        <td class="infoName">Email</td>
                        <td class="infoValue"><?php echo ($resultData['usersEmail']); ?></td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <div class="button"><a href="./deleteUser.php">Delete user</a></div>
            <div class="button"><a href="./modifyProfile.php">Modify profile</a></div>
        </section>
    </div>

<!-- Includer footer (closing tags) -->
<?php include_once 'footerView.php'; ?>
