<?php
if (isset($_POST['signin-submit'])) {

    $email = $_POST['email'];
    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];
    $rpwd = $_POST['rpwd'];

    if (empty($email) || empty($uname) || empty($pwd) || empty($rpwd)) {
        header("Location: ../front/login.php?error=emptyfields&email=" . $email . "uname=" . $uname . "");
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]+$/", $uname)) {
        header("Location: ../front/login.php?error=invalidmailusername");
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../front/login.php?error=invalidemail&uname=" . $uname . "");
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
            $DB = new PDO($DB_DSN . 'dbname=' . $DB_NAME, $DB_USR, $DB_PWD);
            $stmt = $DB->query($DB_USER_INFO_CONTENT);
            $stmt->execute();
            try {
                $stmt = $DB->query("SELECT `Username` FROM `users` WHERE Username=?");
                $stmt->execute($uname);
                $name = $stmt->fetch();
                print_r($name);
            } catch (PDOException $e) {
                throw $e;
            }
        } catch (PDOException $e) {
            throw $e;
        }
        if (!empty($name)) {
            echo "Error : Username is not valid.";
        }
    }
}
