<!--
    * Created on Tue Jun 22 2021
    *
    * Copyright (c) 2021 - Mathéo G & Alex J & Jame FLC - All Right Reserved
    *
    * Licensed under the Apache License, Version 2.0
    * Available on GitHub at https://github.com/Paracetamol56/UwU-game
 -->

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
    $sql = "SELECT usersId, usersName, usersEmail, usersUid, usersPwd FROM users WHERE usersUid = :uid OR usersEmail = :email;";
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

    // Get user id
    $sql = "SELECT usersId FROM users WHERE usersEmail = :email;";
    $sth = $dbh->prepare($sql);
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    $sth->execute(array(':email' => $email));

    $id = ($sth->fetchAll())[0];
    // Automaticaly login the user
    session_start();
    $_SESSION["userid"] = $id;
    $_SESSION["useruid"] = $uid;
    header('location: ./shop.php');
    exit();
}
