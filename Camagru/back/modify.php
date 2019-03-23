<?php

session_start();
//print_r($_POST);
$_SESSION['username'] = $_POST['uname'];
header('Location: ../front/account.php');

// modify informations