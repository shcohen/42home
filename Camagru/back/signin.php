<?php
if (isset($_POST['signin-submit'])) {

    require "../config/setup.php";

    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];
    $rpwd = $_POST['rpwd'];

    if (empty($uname) || empty($pwd) || empty($rpwd)) {
        header("Location: ../front/login.php?error=emptyfields&uname=" . $uname . "");
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]+$/", $uname)) {
        header("Location: ../front/login.php?error=invalidusername");
        exit();
    } else if ($pwd !== $rpwd) {
        header("Location: ../front/login.php?error=passwordcheckfailed&uname=" . $uname . "");
        exit();
    }
    else {
        try {
            $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
            $stmt = $DB->query($DB_USER_INFO_CONTENT);
            $stmt->execute();
            try {
                $stmt = $DB->prepare("SELECT `Username` FROM `users` WHERE Username=?");
                $stmt->execute([$uname]);
                $name = $stmt->fetch();
            } catch (PDOException $e) {
                throw $e;
            }
        } catch (PDOException $e) {
            throw $e;
        }
        if (empty($name)) {
            header("Location: ../front/login.php?error=wrongusername");
            exit();
        } else {
            try {
                $stmt = $DB->prepare("SELECT `Password` FROM `users` WHERE Username=?");
                $stmt->execute([$uname]);
                $response = $stmt->fetch();
                $pwdCheck = password_verify($pwd, $response['Password']);
                 if ($pwdCheck == false) {
                     header("Location: ../front/login.php?error=wrongpwd");
                     exit();
                 } else if ($pwdCheck == true) {
                     session_start();
                     $_SESSION['userID'] = $name['ID'];
                     $_SESSION['useruname'] = $name['Username'];
                     header("Location: ../front/account.php?login=success");
                     exit();
                 } else {
                      header("Location: ../front/login.php?error=wrongpwd");
                      exit();
                 }
            } catch (PDOException $e) {
                throw $e;
            }
        }
    }
}

else {
    header("Location: ../front/login.php?error=accessdenied");
    exit();
}