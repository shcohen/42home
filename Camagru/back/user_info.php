<?php

function hashPwd(){
    $user = $_POST['uname'];
    $pwd = $_POST['pwd'];
    $submit = $_POST['submit'];
    if (!$user || !$pwd || $submit != "OK")
        exit("ERROR\n");
    if (file_exists("../private/passwd")){
        $file = file_get_contents("../private/passwd");
        $tab = unserialize($file);
    } else
        $tab = array();
    foreach ($tab as $key=>$user) {
        if ($user['user'] == $user) {
            exit("ERROR\n");
        }
    }
    $tab[$key + 1]['user'] = $user;
    $tab[$key + 1]['passwd'] = hash("sha256", $pwd);
    $out = serialize($tab);
    if (file_exists("../private/passwd")) {
        file_put_contents("../private/passwd", $out);
        echo "OK\n";
    } else {
        // create file
        file_put_contents("../private/passwd", $out);
        echo "OK\n";
    }
}

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