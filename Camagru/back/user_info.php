<?php

if (!empty($_POST['uname']) && !empty($_POST['pwd'])){
    sign_in($_POST['uname'], $_POST['email'], ($_POST['pwd']));
} else if (!empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['pwd']) && !empty($_POST['rpwd'])){
    sign_up($_POST['email'], $_POST['username'], $_POST['pwd'], $_POST['rpwd']);
} else {
    header("Location: ../front/login.php?error=access_denied");
    exit();
}

function    resubmit_info($error, $dodge) {
    $resub = array();
    foreach ($_POST as $key => $value) {
        if ($key === $dodge || $key === "pwd" || $key === "rpwd") {
            ;
        } else {
            echo $resub[$key];
            $resub[$key] = $value;
        }
    }?>
    <html>
<form style="display: none;" id="resub" action="../front/login.php?error=<?= $error; ?>" method="POST">
    <?php foreach ($resub as $key => $value){?>
        <input type="hidden" name="<?= $key?>" value="<?= $value?>">
    <?php }?>
</form>
<script>
    document.getElementById('resub').submit();
</script>
    </html><?php
}


function    sign_in($username, $email, $pwd) {
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
                    resubmit_info("Invalid password!", "");
                    exit();
                } else if ($pwdCheck == true) {
                    session_start();
                    $_SESSION['username'] = $log['username'];
                    $_SESSION['id'] = $log['acc_id'];
                    header("Location: ../front/account.php?login=success");
                    exit();
                } else {
                    resubmit_info("Invalid password!", "");
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
    include "../config/database.php";

   if (!preg_match("/^[a-zA-Z0-9.!#$%&'*+\=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)+$/", $_POST['email'])) {
        resubmit_info("Invalid email!", "email");
        exit();
    } if (!preg_match("/^[a-zA-Z0-9]{5,20}$/", $username)) {
        resubmit_info("Invalid username!", "username");
        exit();
    } if (!preg_match("/^.{8,40}$/", $pwd) || !preg_match("/^.{8,40}$/", $rpwd) || $pwd !== $rpwd) {
        resubmit_info("Invalid password!", "");
        exit();
    }
    try {
        $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
        $stmt = $DB->prepare("SELECT `username`, `email` FROM `user_info` WHERE `username`=? OR `email`=?");
        $stmt->execute([$username, $email]);
        $user = $stmt->fetch();
        if (empty($user)) {
            $pwd = password_hash($pwd, PASSWORD_BCRYPT);
            $acc_id = uniqid();
            try {
                $stmt = $DB->prepare("INSERT INTO user_info (email, username, `password`, `acc_id`) VALUES (?, ?, ?, ?)");
                $stmt->execute([$email, $username, $pwd, $acc_id]);
//                    $from = "no-reply@camagru.com";
//                    mail($email, "Confirm your account",
//                        "Welcome to Camagru! Please confirm your account by clicking this link http://localhost:8080/login.php?confirm_code=".$acc_id, "From: ".$from);
//                    header("Location: ../email_confirmation.php");
                header('Location: ../front/login.php?creating_account=success');
                exit();
            } catch (PDOException $e) {
                header("Location: ../front/login.php?error=database_error");
                exit();
            }
        } else {
            if ($user['username'] === $username) {
                resubmit_info("Username already taken!", "username");
                exit();
            } else if ($user['email'] === $email) {
                resubmit_info("Email already taken!", "email");
                exit();
            }
        }
    } catch (PDOException $e) {
        header("Location: ../front/login.php?error=database_error");
        exit();
    }
}