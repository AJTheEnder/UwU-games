<?php

function emptyInputSignup($name, $email, $uid, $pwd, $pwdRepeat)
{
    $result;
    if (
        empty($name) ||
        empty($email) ||
        empty($uid) ||
        empty($pwd) ||
        empty($pwdRepeat)
    ) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidUid($uid)
{
    $result;
    if (!preg_match('/^[a-zA-Z0-9]*$/', $uid)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email)
{
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdRepeat)
{
    $result;
    if ($pwd !== $pwdRepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function uidExists($dbh, $uid, $email)
{
    $sql = "SELECT usersName, usersEmail, usersUid, usersPwd FROM users WHERE usersUid = :uid OR usersEmail = :email;";
    $sth = $dbh->prepare($sql);
    $sth->execute(array(':uid' => $uid, ':email' => $email));

    if ($resultData = $sth->fetchAll()) {
        return $resultData[0];
    } else {
        $result = false;
        return $result;
    }
    $sth->closeCursor();
}

function createUser($dbh, $name, $email, $uid, $pwd)
{
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (:name, :email, :uid, :pwd);";
    $sth = $dbh->prepare($sql);
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    $sth->execute(array(':name' => $name, ':email' => $email, ':uid' => $uid, ':pwd' => $hashedPwd));

    header('location: ../signup.php?error=none');
    exit();
}

function emptyInputLogin($uid, $pwd)
{
    $result;
    if (empty($uid) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($dbh, $uid, $pwd)
{
    $uidExists = uidExists($dbh, $uid, $uid);

    if ($uidExists === false) {
        header('location: ../login.php?error=wronglogin');
        exit();
    }

    $hashedPwd = ($uidExists["usersPwd"]);
    $checkPwd = password_verify($pwd, $hashedPwd);

    if ($checkPwd === false) {
        header('location: ../login.php?error=wronglogin');
        exit();
    }
    else {
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        header('location: ../index.php');
        exit();
    }
}