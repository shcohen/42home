<?php

if (isset($_POST['modify'])) {

    require "../config/setup.php";

    $email = $_POST['email'];
    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];
    $rpwd = $_POST['rpwd'];

    if (empty($email) && empty($uname) && empty($pwd) && empty($rpwd)){
        header("Location: ../front/account.php?error=emptyfields");
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]+$/", $uname)){
        header("Location: ../front/account.php?error=invalidmail&username");
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../front/account.php?error=invalidemail&uname=".$uname."");
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]+$/", $uname)) {
        header("Location: ../front/account.php?error=invalidusername&email=".$email."");
        exit();
    } else if ($pwd !== $rpwd) {
        header("Location: ../front/account.php?error=passwordcheckfailed&uname=" . $uname . "");
        exit();
    }

}

else {
    header("Location: ../front/login.php?error=accessdenied");
    exit();
}