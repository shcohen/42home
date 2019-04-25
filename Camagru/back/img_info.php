<?php
session_start();
//print_r($_SESSION['username']);
if (!empty($_POST['img']) && !empty($_POST['stickers']) && !empty($_POST['top']) && !empty($_POST['left']) && !empty($_POST['title'])) {
    createPicture($_SESSION['id'], $_SESSION['username'], $_POST['img'], $_POST['stickers'], intval($_POST['top']), intval($_POST['left']), htmlspecialchars($_POST['title']));
}

// RETRIEVING PICTURES DATAS
function createPicture($id, $user, $img, $stickers, $top, $left, $title) {
    $img_id = uniqid();
    $img = str_replace('data:image/png;base64,', '', $img);
    $img = str_replace(' ', '+', $img);
    $img = base64_decode($img);

    $dest = imagecreatefromstring($img);
    $src = imagecreatefrompng($stickers);
    // Make transparent background
    $newStick = imagecreatetruecolor(200, 200);
    imagesavealpha($newStick, true);
    $color = imagecolorallocatealpha($newStick, 0, 0, 0, 127);
    imagefill($newStick, 0, 0, $color);
    // Layer sticker on top of the background
    imagecopyresampled($newStick, $src, 0, 0, 0, 0, 200, 200, imagesx($src), imagesy($src));
    function imagecopymerge_alpha($dst_im, $src_im, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h, $pct)
    {
        $cut = imagecreatetruecolor($src_w, $src_h);
        imagecopy($cut, $dst_im, 0, 0, $dst_x, $dst_y, $src_w, $src_h);
        imagecopy($cut, $src_im, 0, 0, $src_x, $src_y, $src_w, $src_h);
        imagecopymerge($dst_im, $cut, $dst_x, $dst_y, 0, 0, $src_w, $src_h, $pct);
    }
    // Merging result with original picture
    imagecopymerge_alpha($dest, $newStick, ($left - 675) - 100, ($top - 279) - 100, 0, 0, 200, 200, 100);
    // Final jpeg result
    $title = str_replace(' ', '_', $title);
    if ($pic = imagejpeg($dest, '../pictures/'.$img_id.'.jpeg', 75)) {
        echo 'worked';
    } else
        echo 'failed';
    sendPicturetoDB($id, $user, $img_id, $title);
}

// SENDING PICTURES DATAS TO DATABASE
function sendPicturetoDB($id, $user, $img_id, $title) {
    require "../config/database.php";
    include "../config/setup.php";
    try {
        $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
        $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $DB->prepare("SELECT * FROM `user_info` WHERE `acc_id`=? AND `username`=?");
        $stmt->execute([$id, $user]);
        $log = $stmt->fetch();
        if (!empty($log)) {
            try {
                $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
                $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $DB->prepare("INSERT INTO `img_info` (`acc_id`, `user`, `title`, `img_id`, `date_creation`) VALUES (?, ?, ?, ?, ?)");
                $stmt->execute([$id, $user, $title, $img_id, date('Y-m-d:H-i-s')]);
            } catch (PDOException $e) {
                header("Location: /front/webcam.php?error=database_error");
                exit();
            }
        }
    } catch (PDOException $e) {
        header("Location: /front/webcam.php?error=database_error");
        exit();
    }
}

// DELETING PICTURES
function deletePicture() {
    require "../config/database.php";
    include "../config/setup.php";
    try {
        $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
        $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e;
//        header("Location: /front/webcam.php?error=database_error");
//        exit();
    }
}

// LIKING PICTURES
function getLiked() {
    require "../config/database.php";
    include "../config/setup.php";
    try {
        $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
        $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e;
//        header("Location: /front/webcam.php?error=database_error");
//        exit();
    }
}

// COMMENT PICTURES
function getCommented() {
    require "../config/database.php";
    include "../config/setup.php";
    try {
        $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
        $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e;
//        header("Location: /front/webcam.php?error=database_error");
//        exit();
    }
}