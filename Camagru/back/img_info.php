<?php
if (!empty($_POST['img']) && !empty($_POST['stickers']) && !empty($_POST['top']) && !empty($_POST['left']) && !empty($_POST['title'])) {
    createPicture($_POST['img'], $_POST['stickers'], intval($_POST['top']), intval($_POST['left']), $_POST['title']);
}
//} else if (ya) {
//
//} else {
//    session_start();
//    if (!empty($_SESSION)) {
//        header("Location: /front/account.php");
//        exit();
//    } else
//        session_destroy();
//}

// RETRIEVING PICTURES DATAS
function createPicture($img, $stickers, $top, $left, $title) {
    $img = str_replace('data:image/png;base64,', '', $img);
    $img = str_replace(' ', '+', $img);
    $img = base64_decode($img);

    //    $new_xpos = $left * 200 / 100 - $new_width / 2;
//    $new_ypos = $top * 200 / 100 - $new_height / 2;
//    imagecopymerge_alpha($dest, $newStick, 0, 0, 0, 0, 200, 200, 100);

    $dest = imagecreatefromstring($img);
    $src = imagecreatefrompng($stickers);
    // Make transparent background
    $newStick = imagecreatetruecolor(200, 200);
    imagesavealpha($newStick, true);
    $color = imagecolorallocatealpha($newStick, 0, 0, 0, 127);
    imagefill($newStick, 0, 0, $color);
    // Layer sticker on top of the background
    imagecopyresampled($newStick, $src, 0, 0, 0, 0, 200, 200, imagesx($src), imagesy($src));
    // Final result
    imagepng($newStick, '../pictures/test.png');
    function imagecopymerge_alpha($dst_im, $src_im, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h, $pct)
    {
        $cut = imagecreatetruecolor($src_w, $src_h);
        imagecopy($cut, $dst_im, 0, 0, $dst_x, $dst_y, $src_w, $src_h);
        imagecopy($cut, $src_im, 0, 0, $src_x, $src_y, $src_w, $src_h);
        imagecopymerge($dst_im, $cut, $dst_x, $dst_y, 0, 0, $src_w, $src_h, $pct);
    }
    // Merging result with original picture
    imagecopymerge_alpha($dest, $newStick, ($left - 675) - 100, ($top - 279) - 100, 0, 0, 200, 200, 100);
    // Final png result
    imagepng($dest, '../pictures/image.png');
    // Final jpeg result
    if (imagejpeg($dest, '../pictures/image.jpeg', 75)) {
        echo 'worked';
    } else {
        echo 'failed';
    }
    // sendPicturetoDB();
}

// SENDING PICTURES DATAS TO DATABASE
function sendPicturetoDB() {
    require "../config/database.php";
    include "../config/setup.php";
    try {
        $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
        $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $DB->prepare("SELECT * FROM `user_info` WHERE `acc_id`=?");
        $stmt->execute([$id]);
        $log = $stmt->fetch();
        if (!empty($log)) {
            try {
                $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
                $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $DB->prepare("SELECT `acc_id`, `username` FROM `img_info` WHERE `acc_id`=?");
                $stmt->execute([]);
                $name = $stmt->fetch();
            } catch (PDOException $e) {
                echo $e;
            }
        }
    } catch (PDOException $e) {
        echo $e;
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
    }
}

// COMMENT PICTURES
function getComment() {
    require "../config/database.php";
    include "../config/setup.php";
    try {
        $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
        $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e;
    }
}

//