<?php

if (isset($_POST['signup-submit'])) {

    require "../config/setup.php";

    $email = $_POST['email'];
    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];

    if (empty($email) || empty($uname) || empty($pwd)){
        header("Location: ../front/login.php?error=emptyfields&email=".$email."uname=".$uname."");
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]+$/", $uname)){
        header("Location: ../front/login.php?error=invalidmailusername");
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../front/login.php?error=invalidemail&uname=".$uname."");
        exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]+$/", $uname)) {
        header("Location: ../front/login.php?error=invalidusername&email=".$email."");
        exit();
    }
    else {
        try {
            $DB = new PDO($DB_DSN . 'dbname=' . $DB_NAME, $DB_USR, $DB_PWD);
            $stmt = $DB->query($DB_USER_INFO_CONTENT);
            $stmt->execute();
            try {
                $stmt = $DB->query("SELECT `Email` FROM `users` WHERE Email=?");
                $stmt->execute($email);
                $name = $stmt->fetch();
                print_r($name);
                if (!empty($name)) {
                    echo "Error : Email already exists.";
                }
                else {
                    try {
                        $stmt = $DB->query("INSERT INTO `users` (Username, Email, Password) VALUES (?, ?, ?)");
                        $stmt->execute([$uname, $email, password_hash($pwd, PASSWORD_BCRYPT)]);
                        header('Location: ../index.php');
                        exit();
                    } catch (PDOException $e) {
                        throw $e;
                    }
                }
            } catch (PDOException $e) {
                throw $e;
            }
        } catch (PDOException $e) {
            throw $e;
        }
    }
}