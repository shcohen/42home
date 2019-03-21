<?php



//function emailExits(){
//    $email = $_POST['email'];
//    $stmt = $pdo->prepare("SELECT * FROM users WHERE email=?");
//    $stmt->execute([$email]);
//    $user = $stmt->fetch();
//    if ($user) {
//        echo "OK\n";
//    } else {
//        echo "ERROR : adress already exists.\n";
//    }
//}

//function authEmailPwd(){
//    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
//    $stmt->execute([$_POST['email']]);
//    $user = $stmt->fetch();
//    if ($user && password_verify($_POST['pwd'], $user['pwd'])) {
//        echo "OK\n";
//    } else {
//        echo "ERROR\n";
//    }
//}