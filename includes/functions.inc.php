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

function uidExists($conn, $uid, $email)
{
    $sql = 'SELECT usersId FORM users WHERE usersUid = ? OR usersEmail = ?;';
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location: ../signup.php?error=stmtfailed');
        exit();
    }

    mysqli_stmt_bind_param($stmt, 'ss', $uid, $email);
    mysqli_stmt_exectute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}
/*
function createUser($conn, $name, $email, $uid, $pwd)
{
    $sql =
        'INSERT INTO users (usersName, usersEmail, usersUid, userPwd ) VALUES (?, ?, ?, ?);';
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stml, $sql)) {
        header('location: ../signup.php?error=stmtfailed');
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, 'ssss', $name, $email, $uid, $pwd);
    mysqli_stmt_exectute($stmt);

    mysqli_stmt_close($stmt);

    header('location: ../signup.php?error=none');
    exit();
}
*/
