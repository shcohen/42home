<?php

if (!empty($_POST['reco_email'])) {
    forgotPwd($_POST['reco_email']);
} else if (!empty($_GET['id_reset']) && !empty($_POST['new_pwd']) && !empty($_POST['check'])) {
    resetPwd($_GET['id_reset'], $_POST['new_pwd'], $_POST['check']);
} else if (!empty($_POST['new_email']) || !empty($_POST['new_uname']) || !empty($_POST['pwd']) && !empty($_POST['new_check'])) {
    session_start();
    updateInfo($_POST['new_email'], htmlspecialchars($_POST['new_uname']), $_POST['pwd'], $_POST['new_check'], $_SESSION['id']);
} else if (!empty($_POST['update']) && $_POST['update'] === 'notify' && !empty($_POST['checkbox'])) {
    session_start();
    $value = $_POST['checkbox'] === 'true' ? 1 : 0;
    echo $value;
    ableNotify($_SESSION['id'], $value);
    exit();
} else {
    session_start();
    if (!empty($_SESSION)) {
        header("Location: /front/account.php");
        exit();
    } else {
        session_destroy();
        header("Location: /index.php?error=access_denied");
        exit();
    }
}

// SEND FORGOT PASSWORD LINK
function    forgotPwd($email) {
    require "../config/database.php";
    include "../config/setup.php";
    try {
        $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
        $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $DB->prepare("SELECT * FROM `user_info` WHERE `email`=?");
        $stmt->execute([$email]);
        $log = $stmt->fetch();
        if (!empty($log)) {
            if ($log['email'] === $email) {
                $from = "no-reply@camagru.com";
                mail($email, "Reset your password",
                    "Hello! You asked for a password reset, please click this link to proceed : http://".$_SERVER['HTTP_HOST']."/front/recoverpwd.php?id_reset=".$log['acc_id'], "From: ".$from);
                header("Location: /front/forgotpwd.php?success=recovery_mail_send");
                exit();
            } else {
                header("Location: /front/forgotpwd.php?error=invalid_email_adress");
                exit();
            }
        } else {
            header("Location: /front/forgotpwd.php?error=email_not_registered");
            exit();
        }
    }
    catch (PDOException $e) {
        header("Location: /front/forgotpwd.php?error=database_error");
        exit();
    }
}

// RESET PASSWORD
function    resetPwd($id, $new, $check) {
    require "../config/database.php";
    include "../config/setup.php";
    if ($new === $check) {
        if (!preg_match("/^.{6,40}$/", $new)) {
            header("Location: /front/recoverpwd.php?id_reset=$id&error=weak_pwd=less_than_6char");
            exit();
        } else {
            try {
                $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
                $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $DB->prepare("SELECT * FROM `user_info` WHERE `acc_id`=?");
                $stmt->execute([$id]);
                $log = $stmt->fetch();
                if (!empty($log)) {
                    try {
                        if (password_verify($new, $log['password'])) {
                            header("Location: /front/recoverpwd.php?error=account=same_pwd");
                            exit();
                        }
                        $pwd = password_hash($new, PASSWORD_BCRYPT);
                        $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
                        $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $stmt = $DB->prepare("UPDATE `user_info` SET `password`=? WHERE `acc_id`=?");
                        $stmt->execute([$pwd, $id]);
                        header("Location: /front/login.php?success=password_reset");
                        exit();
                    }
                    catch (PDOException $e) {
                        header("Location: /front/recoverpwd.php?id_reset=$id&error=database_error");
                        exit();
                    }
                } else {
                    header("Location: /front/recoverpwd.php?id_reset=$id&error=wrong_reset_id");
                    exit();
                }
            }
            catch (PDOException $e) {
                header("Location: /front/recoverpwd.php?id_reset=$id&error=database_error");
                exit();
            }
        }
    } else {
        header("Location: /front/recoverpwd.php?id_reset=$id&error=wrong_pwd");
        exit();
    }
}

// ENABLE OR DISABLE NOTIFICATIONS
function    ableNotify($id, $notif) {
    require "../config/database.php";
    include "../config/setup.php";
    try {
        $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
        $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $DB->prepare("SELECT `notify` FROM `user_info` WHERE `acc_id`=?");
        $stmt->execute([$id]);
        $log = $stmt->fetch();
        if (!empty($log)) {
            if (intval($log['notify']) === 1) {
                try {
                    $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
                    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $DB->prepare("UPDATE `user_info` SET `notify`=? WHERE `acc_id`=?");
                    $stmt->execute([$notif, $id]);
                    echo "OK";
                    exit();
                } catch (PDOException $e) {
                    echo "KO";
                    exit();
                }
            } else if (intval($log['notify']) === 0){
                try {
                    $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
                    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $DB->prepare("UPDATE `user_info` SET `notify`=? WHERE `acc_id`=?");
                    $stmt->execute([$notif, $id]);
                    echo "OK";
                    exit();
                } catch (PDOException $e) {
                    echo "KO";
                    exit();
                }
            }
        }
    } catch (PDOException $e) {
        echo "KO";
        exit();
    }
}

// MODIFY USER INFOS
function    updateInfo($email, $username, $new, $check, $id){
    require "../config/database.php";
    include "../config/setup.php";

    if ((!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) && !empty($username) && !preg_match("/^[a-zA-Z0-9]{5,25}$/", $username)) {
        header("Location: /front/account.php?error=invalid_fields=email&username");
        exit();
    } if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: /front/account.php?error=invalid_email_address");
        exit();
    } if (!empty($username) && !preg_match("/^[a-zA-Z0-9]{5,25}$/", $username)) {
        header("Location: /front/account.php?error=invalid_username");
        exit();
    } if (!empty($new) && !empty($check) && !preg_match("/^.{6,30}$/", $new) && !preg_match("/^.{6,30}$/", $check) && $new !== $check) {
        header("Location: /front/account.php?error=invalid_pwd");
        exit();
    }

    if (!empty($email) && !empty($username)) {
        try {
            $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
            $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $DB->prepare("SELECT * FROM `user_info` WHERE `acc_id`=?");
            $stmt->execute([$id]);
            $fetch = $stmt->fetch();
            if (!empty($fetch)) {
                try {
                    $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
                    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $DB->prepare("UPDATE `user_info` SET `email`=?, `username`=? WHERE `acc_id`=?");
                    $stmt->execute([$email, $username, $id]);
                    $_SESSION['username'] = $username;
                    header("Location: /front/account.php?success=email_address&username_changed");
                    exit();
                } catch (PDOException $e) {
                    header("Location: /front/account.php?error=database_error");
                    exit();
                }
            }
        } catch (PDOException $e) {
            header("Location: /front/account.php?error=database_error");
            exit();
        }
    }

    // UPDATING EMAIL
    if (!empty($email)) {
    try {
        $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
        $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $DB->prepare("SELECT * FROM `user_info` WHERE `acc_id`=?");
        $stmt->execute([$id]);
        $fetch = $stmt->fetch();
        if (!empty($fetch)) {
            try {
                $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
                $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $DB->prepare("SELECT * FROM `user_info` WHERE `email`=?");
                $stmt->execute([$email]);
                $log = $stmt->fetch();
                if (empty($log)) {
                    try {
                        $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
                        $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $stmt = $DB->prepare("UPDATE `user_info` SET `email`=? WHERE `acc_id`=?");
                        $stmt->execute([$email, $id]);
                        header("Location: /front/account.php?success=email_address_changed");
                        exit();
                    } catch (PDOException $e) {
                        header("Location: /front/account.php?error=database_error");
                        exit();
                    }
                } else {
                    header("Location: /front/account.php?error=email_adress_already_taken");
                    exit();
                }
            } catch (PDOException $e) {
                header("Location: /front/account.php?error=database_error");
                exit();
            }
        }
    } catch (PDOException $e) {
        header("Location: /front/account.php?error=database_error");
        exit();
    }
}

    // UPDATING USERNAME
    if (!empty($username)) {
    try {
        $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
        $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $DB->prepare("SELECT * FROM `user_info` WHERE `acc_id`=?");
        $stmt->execute([$id]);
        $fetch = $stmt->fetch();
        if (!empty($fetch)) {
            try {
                $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
                $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $DB->prepare("UPDATE `user_info` SET `username`=? WHERE `acc_id`=?");
                $stmt->execute([$username, $id]);
                $_SESSION['username'] = $username;
                try {
                    $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
                    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $DB->prepare("UPDATE `img_info` SET `user`=? WHERE `acc_id`=?");
                    $stmt->execute([$username, $id]);
                    try {
                        $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
                        $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $stmt = $DB->prepare("UPDATE `like_info` SET `user`=? WHERE `acc_id`=?");
                        $stmt->execute([$username, $id]);
                        try {
                            $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
                            $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $stmt = $DB->prepare("UPDATE `com_info` SET `user`=? WHERE `acc_id`=?");
                            $stmt->execute([$username, $id]);
                        } catch (PDOException $e) {
                            header("Location: /front/account.php?error=database_error");
                            exit();
                        }
                    } catch (PDOException $e) {
                        echo $e;
                        header("Location: /front/account.php?error=database_error");
                        exit();
                    }
                } catch (PDOException $e) {
                    echo $e;
                    header("Location: /front/account.php?error=database_error");
                    exit();
                }
                header("Location: /front/account.php?success=username_changed");
                exit();
            } catch (PDOException $e) {
                header("Location: /front/account.php?error=database_error");
                exit();
            }
        }
    } catch (PDOException $e) {
        header("Location: /front/account.php?error=database_error");
        exit();
    }
}

    // UPDATING PASSWORD
    if ($new === $check) {
        if (!preg_match("/^.{6,40}$/", $new)) {
            header("Location: /front/account.php?error=weak_pwd=less_than_6char");
            exit();
        } else {
            try {
                $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
                $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $DB->prepare("SELECT * FROM `user_info` WHERE `acc_id`=?");
                $stmt->execute([$id]);
                $log = $stmt->fetch();
                if (!empty($log)) {
                    try {
                        if (password_verify($new, $log['password'])) {
                            header("Location: /front/account.php?account=same_pwd");
                            exit();
                        }
                        $pwd = password_hash($new, PASSWORD_BCRYPT);
                        $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
                        $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $stmt = $DB->prepare("UPDATE `user_info` SET `password`=? WHERE `acc_id`=?");
                        $stmt->execute([$pwd, $id]);
                        header("Location: /front/account.php?success=password_changed");
                        exit();
                    }
                    catch (PDOException $e) {
                        header("Location: /front/account.php?error=database_error");
                        exit();
                    }
                } else {
                    header("Location: /front/account.php?error=wrong_account_id");
                    exit();
                }
            }
            catch (PDOException $e) {
                header("Location: /front/account.php?error=database_error");
                exit();
            }
        }
    } else {
        header("Location: /front/account.php?error=wrong_pwd");
        exit();
    }
}