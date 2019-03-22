<?php
if (isset($_POST['signin-submit'])) {

    require "../config/setup.php";

    $email = $_POST['email'];
    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];
    $rpwd = $_POST['rpwd'];

    if (empty($uname) || empty($pwd) || empty($rpwd)) {
        header("Location: ../front/login.php?error=emptyfields&email=" . $email . "uname=" . $uname . "");
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]+$/", $uname)) {
        header("Location: ../front/login.php?error=invalidusername&email=" . $email . "");
        exit();
    } else if ($pwd !== $rpwd) {
        header("Location: ../front/login.php?error=passwordcheckfailed&email=" . $email . "uname=" . $uname . "");
        exit();
    }
    else {
        try {
            $DB = new PDO($DB_DSNAME, $DB_NAME, $DB_USR, $DB_PWD);
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
        // Error : User does not exist.
        if (!empty($name)) {
            echo "Error : Username is not valid.";
        } else {
            try {
                $stmt = $DB->prepare("SELECT `Password` FROM `users` WHERE Password=?");
                $stmt->execute([$uname, $email, password_hash($pwd, PASSWORD_BCRYPT)]);
                // $pwdCheck = password_verify($pwd, $row['Password]);
                // if ($pwdCheck == false) {
                //  header(Location: "../front/login.php?error=wrongpwd");
                // exit();
                // } else if ($pwdCheck == true) {
                //  session_start();
                // $_SESSION[userID] = $row['ID'];
                // $_SESSION[useruname] = $row['Username'];
                // header("Location: ../front/login.php?login=sucess");
                //  exit();
                // } else {
                //  header("Location: ../front/login.php?error=wrongpwd");
                //  exit();
                // }
                header("Location: ../account.php");
                exit();
            } catch (PDOException $e) {
                throw $e;
            }
        }
    }
}

else {
    header("Location: ../front/login.php");
    exit();
}