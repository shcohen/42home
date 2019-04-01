<?php

if (!empty($_POST['reco_email'])) {
    forgotPwd($_POST['reco_email']);
} else if (!empty($_POST['id_reset']) && !empty($_POST['new_pwd']) && !empty($_POST['check'])) {
    resetPwd($_POST['id_reset'], $_POST['new_pwd'], $_POST['check']);
} else {
    header("Location: ../front/login.php?error=access_denied");
    exit();
}

function    forgotPwd($email) {
    require "../config/database.php";
    include "../config/setup.php";
    try {
        $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
        $stmt = $DB->prepare("SELECT * FROM user_info WHERE email=?");
        $stmt->execute([$email]);
        $log = $stmt->fetch();
        if (!empty($log)) {
            if ($log['email'] === $email) {
                $from = "no-reply@camagru.com";
                mail($email, "Reset your password",
                    "Hello! You asked for a password reset, please click this link to proceed : http://localhost:8080/front/recoverpwd.php?id_reset=".$log['acc_id'], "From: ".$from);
                header("Location: ../front/forgotpwd?success=recovery_mail_send");
            } else {
                header("Location: ../front/forgotpwd.php?error=invalid_email_adress");
            }
        } else {
            header("Location: ../front/forgotpwd.php?error=email_not_registered");
        }
    }
    catch (PDOException $e) {
        header("Location: ../front/forgotpwd.php?error=database_error");
    }
}

function    resetPwd($id, $new, $check) {
    require "../config/database.php";
    include "../config/setup.php";
    if ($new === $check) {
        if (!preg_match("/^.{8,40}$/", $new)) {
            header("Location: ../front/recoverpwd.php?id_reset=$id&error=weak_pwd=less_than_8char");
            exit ;
        } else {
            try {
                $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
                $stmt = $DB->prepare("SELECT * FROM user_info WHERE acc_id=?");
                $stmt->execute([$id]);
                $log = $stmt->fetch();
                if (!empty($log)) {
                    try {
                        if (password_verify($new, $log['password'])) {
                            header("Location: ../front/recoverpwd.php?account=same_pwd");
                            exit ;
                        }
                        $psw = password_hash($new, PASSWORD_BCRYPT);
                        $stmt = $DB->prepare("UPDATE user_info SET password=? WHERE acc_id=?");
                        $stmt->execute([$psw, $id]);
                        header("Location: ../front/recoverpwd.php?success=password_reset");
                    }
                    catch (PDOException $e) {
                        header("Location: ../front/recoverpwd.php?id_reset=$id&error=database_error");
                    }
                } else {
                    header("Location: ../front/recoverpwd.php?id_reset=$id&error=wrong_reset_id");
                }
            }
            catch (PDOException $e) {
                header("Location: ../front/recoverpwd.php?id_reset=$id&error=database_error");
            }
        }
    } else {
        header("Location: ../front/recoverpwd.php?id_reset=$id&error=wrong_pwd");
    }
}