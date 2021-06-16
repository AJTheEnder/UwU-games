<?php include_once 'header.php'; ?>
    <div class="wrapper">
        <section class="signup-form">
            <?php include_once __DIR__ . '/includes/profile.inc.php'; ?>
            <?php echo("<h2>Hello " . $resultData['usersName'] . "</p>"); ?>
            <table>
                <tbody>
                    <tr>
                        <td>Username</td>
                        <td><?php echo ($resultData['usersName']); ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?php echo ($resultData['usersEmail']); ?></td>
                    </tr>
                </tbody>
            </table>
        </section>
    </div>
<?php include_once 'footer.php'; ?>
