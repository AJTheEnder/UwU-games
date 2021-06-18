<?php include_once 'headerView.php'; ?>
    <div class="wrapper">
        <section class="signup-form">
            <form action="./modifyProfileValidate.php" method="post" class="modifyProfile-form">
                <table>
                    <tbody>
                        <tr>
                            <td>Username</td>
                            <td>
                                <input type="text" name="uid" placeholder="Change username" value="<?php echo $resultData['usersUid'] ?>" class="signup-input">
                            </td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>
                                <input type="text" name="name" placeholder="Change name" value="<?php echo $resultData['usersName'] ?>" class="signup-input">
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>
                            <input type="text" name="email" placeholder="Change Email" value="<?php echo $resultData['usersEmail'] ?>" class="signup-input">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button type="submit" name="submit" id="ModifySubmit">Apply</button>
            </form>
        </section>
    </div>
<?php include_once 'footerView.php'; ?>
