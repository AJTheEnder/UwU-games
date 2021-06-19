<?php
    session_start();

    require_once __DIR__ . '/../model/signupModel.php';

    function emptyInputProfile($name, $email, $uid)
    {
        $result;
        if (
            empty($name) ||
            empty($email) ||
            empty($uid)
        ) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    function applyModif($dbh, $name, $email, $uid)
    {
        var_dump($name);
        var_dump($email);
        var_dump($uid);
        $sql = "UPDATE users SET usersName = :name, usersEmail = :email, usersUid = :uid WHERE usersId = :id;";
        $sth = $dbh->prepare($sql);
        $sth->execute(array(':name' => $name, ':email' => $email, ':uid' => $uid, ':id' => $_SESSION["userid"]));

        $_SESSION["useruid"] = $uid;

        header('location: ./profile.php');
        exit();
    }

    function invalidExtention($fileName, $allowed) {
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $result;

        if (in_array($fileActualExt, $allowed)) {
            $result = fileActualExt;
        }
        else {
            $result = true;
        }
        return $result;
    }