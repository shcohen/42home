<?php

if (!empty($_POST['uname']) && !empty($_POST['pwd'])){
    sign_in($_POST['uname'], $_POST['email'], ($_POST['pwd']));
} else if (!empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['pwd']) && !empty($_POST['rpwd'])){
    sign_up($_POST['email'], $_POST['username'], $_POST['pwd'], $_POST['rpwd']);
} else {
    header("Location: ../front/login.php?error=access_denied");
    exit();
}

function    sign_in($username, $email, $pwd) {
    require "../config/database.php";
    include "../config/setup.php";
    try {
        $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
        $stmt = $DB->prepare("SELECT `username`, `email` FROM `users_info` WHERE `username`=? OR `email`=?");
        $stmt->execute([$username, $email]);
        $log = $stmt->fetch();
        if (empty($log)) {
            header("Location: ../front/login.php?error=account_does_not_exist");
            exit();
        } else {
            try {
                $stmt = $DB->prepare("SELECT `password` FROM `users` WHERE `username`=?");
                $stmt->execute([$username]);
                $log = $stmt->fetch();
                $pwdCheck = password_verify($pwd, $log['password']);
                if ($pwdCheck == false) {
                    header("Location: ../front/login.php?error=invalid_pwd");
                    exit();
                } else if ($pwdCheck == true) {
                    session_start();
                    $_SESSION['username'] = $log['username'];
                    $_SESSION['id'] = $log['acc_id'];
                    header("Location: ../front/account.php?login=success");
                    exit();
                } else {
                    header("Location: ../front/login.php?error=invalid_pwd");
                    exit();
                }
            } catch (PDOException $e) {
                throw $e;
            }
        }
    }
    catch (PDOException $e) {
        header("Location: ../front/login.php?error=database_error");
        exit();
    }
}


function    sign_up($email, $username, $pwd, $rpwd) {
    require "../config/database.php";
    include "../config/setup.php";
    if ((!filter_var($email, FILTER_VALIDATE_EMAIL)) && !preg_match("/^[a-zA-Z0-9]{5,20}$/", $username)) {
        header("Location: ../front/login.php?error=invalid_fields=email&username");
        exit();
    } if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../front/login.php?error=invalidemail&uname=".$username."");
        exit();
    } if (!preg_match("/^[a-zA-Z0-9]{5,25}$/", $username)) {
        header("Location: ../front/login.php?error=invalid_username&email=". $email."");
        exit();
    } if (!preg_match("/^.{6,30}$/", $pwd) || !preg_match("/^.{6,30}$/", $rpwd) || $pwd !== $rpwd) {
        header("Location: ../front/login.php?error=invalid_pwd");
        exit();
    }
    try {
        $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
        $stmt = $DB->prepare("SELECT `username`, `email` FROM `user_info` WHERE `username`=? OR `email`=?");
        $stmt->execute([$username, $email]);
        $log = $stmt->fetch();
        if (empty($log)) {
            $pwd = password_hash($pwd, PASSWORD_BCRYPT);
            $acc_id = uniqid();
            try {
                $stmt = $DB->prepare("INSERT INTO user_info (email, username, `password`, `acc_id`) VALUES (?, ?, ?, ?)");
                $stmt->execute([$email, $username, $pwd, $acc_id]);
                    $from = "no-reply@camagru.com";
                    mail($email, "Confirm your account",
                        "Welcome to Camagru! Please confirm your account by clicking this link http://localhost:8080/login.php?confirm_code=".$acc_id, "From: ".$from);
                    header("Location: ../front/login.php?success=confirmation_e.mail_send");
                header('Location: ../front/login.php?success=account_created');
                exit();
            } catch (PDOException $e) {
                header("Location: ../front/login.php?error=database_error");
                exit();
            }
        } else {
            if ($log['username'] === $username) {
                header("Location: ../front/login.php?error=username_taken");
                exit();
            } else if ($log['email'] === $email) {
                header("Location: ../front/login.php?error=email_taken");
                exit();
            }
        }
    } catch (PDOException $e) {
        header("Location: ../front/login.php?error=database_error");
        exit();
    }
}