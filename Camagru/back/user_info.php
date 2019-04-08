<?php

if (!empty($_POST['uname']) && !empty($_POST['pwd'])) {
    sign_in($_POST['uname'], $_POST['pwd']);
} else if (!empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['pwd']) && !empty($_POST['rpwd'])){
    sign_up($_POST['email'], $_POST['username'], $_POST['pwd'], $_POST['rpwd']);
} else if (!empty($_GET['confirm_code'])) {
    confirm($_GET['confirm_code']);
} else {
    session_start();
    if (!empty($_SESSION)) {
        header("Location: /front/account.php");
        exit();
    } else {
        session_destroy();
    }
}

function    confirm($code) {
    require "../config/database.php";
    include "../config/setup.php";
    try {
        $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
        $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $DB->prepare("SELECT `validate` FROM `user_info` WHERE `acc_id`=?");
        $stmt->execute([$code]);
        $log = $stmt->fetch();
        if (!empty($log)) {
            if (intval($log['validate']) === 1) {
                header("Location: /front/login.php?account=already_confirmed");
                exit();
            } else {
                try {
                    $stmt = $DB->prepare("UPDATE `user_info` SET `validate`=? WHERE acc_id=?");
                    $stmt->execute([1, $code]);
                    header("Location: /front/login.php?success=account_validated");
                } catch (PDOException $e) {
                    header("Location: /front/login.php?error=database_error");
                }
            }
        }
    }
    catch (PDOException $e) {
        header("Location: /front/login.php?error=database_error");
    }
}

function    sign_in($username, $pwd) {
    require "../config/database.php";
    include "../config/setup.php";
    try {
        $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
        $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $DB->prepare("SELECT `username` FROM `user_info` WHERE `username`=?");
        $stmt->execute([$username]);
        $log = $stmt->fetch();
        if (empty($log)) {
            header("Location: /front/login.php?error=account_does_not_exist");
            exit();
        } else {
            try {
                $stmt = $DB->prepare("SELECT `username`, `password`, `acc_id` FROM `user_info` WHERE `username`=?");
                $stmt->execute([$username]);
                $fetch = $stmt->fetch();
                $pwdCheck = password_verify($pwd, $fetch['password']);
                if ($pwdCheck == false) {
                    header("Location: /front/login.php?error=invalid_pwd");
                    exit();
                } else if ($pwdCheck == true) {
                    session_start();
                    $_SESSION['username'] = $fetch['username'];
                    $_SESSION['id'] = $fetch['acc_id'];
                    header("Location: /front/account.php?login=success");
                    exit();
                } else {
                    header("Location: /front/login.php?error=invalid_pwd");
                    exit();
                }
            } catch (PDOException $e) {
                throw $e;
            }
        }
    }
    catch (PDOException $e) {
        header("Location: /front/login.php?error=database_error");
        exit();
    }
}


function    sign_up($email, $username, $pwd, $rpwd) {
    require "../config/database.php";
    include "../config/setup.php";
    if ((!filter_var($email, FILTER_VALIDATE_EMAIL)) && !preg_match("/^[a-zA-Z0-9]{5,25}$/", $username)) {
        header("Location: /front/login.php?error=invalid_fields=email&username");
        exit();
    } if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: /front/login.php?error=invalidemail&uname=".$username."");
        exit();
    } if (!preg_match("/^[a-zA-Z0-9]{5,25}$/", $username)) {
        header("Location: /front/login.php?error=invalid_username&email=". $email."");
        exit();
    } if (!preg_match("/^.{6,30}$/", $pwd) || !preg_match("/^.{6,30}$/", $rpwd) || $pwd !== $rpwd) {
        header("Location: /front/login.php?error=invalid_pwd");
        exit();
    }

    try {
        $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
        $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $DB->prepare("SELECT `username`, `email` FROM `user_info` WHERE `username`=? OR `email`=?");
        $stmt->execute([$username, $email]);
        $log = $stmt->fetch();
        if (empty($log)) {
            $pwd = password_hash($pwd, PASSWORD_BCRYPT);
            $acc_id = uniqid();
            try {
                $stmt = $DB->prepare("INSERT INTO `user_info` (`email`, `username`, `password`, `acc_id`, `notify`, `validate`) VALUES (?, ?, ?, ?, true, false)");
                $stmt->execute([$email, $username, $pwd, $acc_id]);
                $from = "no-reply@camagru.com";
                mail($email, "Confirm your account",
                        "Welcome to Camagru! Please confirm your account by clicking this link http://".$_SERVER['HTTP_HOST']."/front/login.php?confirm_code=".$acc_id, "From: ".$from);
                header("Location: /front/login.php?success=confirmation_mail_send");
                exit();
            } catch (PDOException $e) {
                header("Location: /front/login.php?error=database_error");
                exit();
            }
        } else {
            if ($log['username'] === $username) {
                header("Location: /front/login.php?error=username_taken");
                exit();
            } else if ($log['email'] === $email) {
                header("Location: /front/login.php?error=email_taken");
                exit();
            }
        }
    } catch (PDOException $e) {
        header("Location: /front/login.php?error=database_error");
        exit();
    }
}