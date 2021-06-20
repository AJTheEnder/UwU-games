<?php include_once 'headerView.php'; ?>
    <div class="wrapper">
        <section id="modifyProfileForm" class="formSection">
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
            <form action="./modifyProfileValidate.php" method="post"  enctype="multipart/form-data" class="form">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <img src="<?php echo("assets/img/upload/avatar/avatar" . $_SESSION["userid"] . ".png")?>" alt="avatar" class="avatar" height="200px" width="200px">
                            </td>
                            <td>
                                <div class="boxInput"><input type="file" name="avatar"></div>
                                <button type="submit" name="upload" class="button">Upload</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>
                                <input type="text" name="uid" placeholder="Change username" value="<?php echo $resultData['usersUid'] ?>" class="textInput">
                            </td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>
                                <input type="text" name="name" placeholder="Change name" value="<?php echo $resultData['usersName'] ?>" class="textInput">
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>
                            <input type="text" name="email" placeholder="Change Email" value="<?php echo $resultData['usersEmail'] ?>" class="textInput">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button type="submit" name="submit" class="button">Apply</button>
            </form>
        </section>
    </div>
<?php include_once 'footerView.php'; ?>
