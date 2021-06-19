<?php include_once 'headerView.php'; ?>
    <div class="wrapper">
        <section class="signup-form">
            <table>
                <tbody>
                    <tr>
                        <td><img src="<?php echo("assets/img/upload/avatar/avatar" . $_SESSION["userid"] . ".jpg")?>" alt="avatar" height="200px" width="200px"></td>
                        <td><?php echo("<h2>Hello " . $resultData['usersName'] . "</p>"); ?></td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td><?php echo ($resultData['usersUid']); ?></td>
                    </tr>
                    <tr>
                        <td>Full name</td>
                        <td><?php echo ($resultData['usersName']); ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?php echo ($resultData['usersEmail']); ?></td>
                    </tr>
                </tbody>
            </table>
            <a href="./deleteUser.php">Delete user</a>
            <a href="./modifyProfile.php">Modify profile</a>
        </section>
    </div>
<?php include_once 'footerView.php'; ?>
