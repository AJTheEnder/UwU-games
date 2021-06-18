<?php include_once 'headerView.php'; ?>
    <div class="wrapper">
        <section class="signup-form">
            <?php echo("<h2>Hello " . $resultData['usersName'] . "</p>"); ?>
            <table>
                <tbody>
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
