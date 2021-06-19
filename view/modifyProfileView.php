<?php include_once 'headerView.php'; ?>
    <div class="wrapper">
        <section class="signup-form">
            <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "invalidextention") {
                        echo "<p class='errorMessage'>Your file is not supported, allowed extentions are jpg, jpeg, png</p>";
                    }
                    if ($_GET["error"] == "fileerror") {
                        echo "<p class='errorMessage'>An error occured when uploading your file</p>";
                    }
                    if ($_GET["error"] == "oversizefile") {
                        echo "<p class='errorMessage'>Your file is oversized, maximum is 2MB</p>";
                    }
                }
            ?>
            <form action="./modifyProfileValidate.php" method="post"  enctype="multipart/form-data" class="modifyProfile-form">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <img src="<?php echo("assets/img/upload/avatar/avatar" . $_SESSION["userid"] . ".jpg")?>" alt="avatar" height="200px" width="200px">
                            </td>
                            <td>
                                <input type="file" name="avatar" class="avatar">
                                <button type="submit" name="upload" id="ModifySubmit">Upload</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>
                                <input type="text" name="uid" required placeholder="Change username" value="<?php echo $resultData['usersUid'] ?>" class="profile-input">
                            </td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>
                                <input type="text" name="name" required placeholder="Change name" value="<?php echo $resultData['usersName'] ?>" class="profile-input">
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>
                            <input type="text" name="email" required placeholder="Change Email" value="<?php echo $resultData['usersEmail'] ?>" class="profile-input">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button type="submit" name="submit" id="ModifySubmit">Apply</button>
            </form>
        </section>
    </div>
<?php include_once 'footerView.php'; ?>
