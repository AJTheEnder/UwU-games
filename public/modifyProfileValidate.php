<?php
    session_start();

    require_once __DIR__ . '/../db/dbh.php';

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $uid = $_POST['uid'];

        include_once __DIR__ . '/../model/modifyProfileModel.php';

        if (emptyInputProfile($name, $email, $uid) === true) {
            header('location: ./modifyProfile.php?error=emptyinput');
            exit();
        }

        if (invalidUid($uid) !== false) {
            header('location: ./modifyProfile.php?error=invaliduid');
            exit();
        }

        if (invalidEmail($email) !== false) {
            header('location: ./modifyProfile.php?error=invalidemail');
            exit();
        }

        applyModif($dbh, $name, $email, $uid);
    }
    else if (isset($_POST['upload'])) {
        $fileName = $_FILES['avatar']['name'];
        $fileTmpName = $_FILES['avatar']['tmp_name'];
        $fileSize = $_FILES['avatar']['size'];
        $fileError = $_FILES['avatar']['error'];
        $fileType = $_FILES['avatar']['type'];

        $fileActualExt = strtolower(end(explode('.', $fileName)));
        $allowed = array("jpg", "jpeg", "png");

        if (in_array($fileActualExt, $allowed) !== true) {
            header('location: ./modifyProfile.php?error=invalidextention');
            exit();
        }

        if ($fileError !== 0) {
            header('location: ./modifyProfile.php?error=fileerror');
            exit();
        }

        if ($fileSize > 2000000) {
            header('location: ./modifyProfile.php?error=oversizefile');
            exit();
        }

        $fileDestination = __DIR__ . '/assets/img/upload/avatar/avatar' . $_SESSION["userid"] . '.png';

        move_uploaded_file($fileTmpName, $fileDestination);

        header('location: ./modifyProfile.php?error=uploadsuccess');
        exit();
    }
    else {
        header('location: ./modifyProfile.php');
    }
