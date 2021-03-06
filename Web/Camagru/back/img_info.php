<?php
session_start();
if (!empty($_POST['img']) && !empty($_POST['stickers']) && !empty($_POST['top']) && !empty($_POST['left']) && !empty($_POST['title'])) {
    if (file_exists("../assets/stickers")) {
        $files = array_diff(scandir('../assets/stickers'), array('.', '..'));
        $check = preg_replace(';http://'.$_SERVER['HTTP_HOST'].'/assets/stickers/;', '', $_POST['stickers']);
        foreach ($files as $key => $value) {
            if ($check === $value) {
    createPicture($_SESSION['id'], $_SESSION['username'], $_POST['img'], preg_replace(';http://'.$_SERVER['HTTP_HOST'].';', '..', $_POST['stickers']), intval($_POST['top']), intval($_POST['left']), htmlspecialchars(trim($_POST['title'])));
} } } } else if (!empty($_POST['img_id']) && !empty($_POST['like'])) {
    getLiked($_POST['img_id']);
} else if (!empty($_POST['img_id']) && !empty($_POST['comment'])) {
    getCommented($_POST['img_id'], htmlspecialchars(trim($_POST['comment'])));
} else if (!empty($_POST['img_id']) && !empty($_POST['delete'])) {
    deletePicture($_POST['img_id']);
} else {
    header("Location: /index.php?error=access_denied");
}

// RETRIEVING PICTURES DATAS
function createPicture($id, $user, $img, $stickers, $top, $left, $title)
{
    if (!$title || $stickers === "http://".$_SERVER['HTTP_HOST']."/front/webcam.php") {
        exit();
    }
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
    if ($pic = imagejpeg($dest, '../pictures/' . $img_id . '.jpeg', 75)) {
        echo 'worked';
    } else
        echo 'failed';
    sendPicturetoDB($id, $user, $img_id, $title);
}

// SENDING PICTURES DATAS TO DATABASE
function sendPicturetoDB($id, $user, $img_id, $title)
{
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
                $stmt = $DB->prepare("INSERT INTO `img_info` (`acc_id`, `user`, `title`, `img_id`, `likes`, `date_creation`) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->execute([$id, $user, $title, $img_id, 0, date('Y-m-d:H-i-s')]);
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

// LIKING PICTURES
function getLiked($img_id)
{
    require "../config/database.php";
    include "../config/setup.php";
    try {
        $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
        $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $DB->prepare("SELECT `acc_id`, `img_id` FROM `like_info` WHERE `acc_id`=? AND `img_id`=?");
        $stmt->execute([$_SESSION['id'], $img_id]);
        $log = $stmt->fetch();
        if (empty($log)) {
            try {
                echo "Rien";
                $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
                $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $DB->prepare("SELECT `acc_id`, `likes` FROM `img_info` WHERE `img_id`=?");
                $stmt->execute([$img_id]);
                $count = $stmt->fetch();
                print_r($count);
                echo $img_id;
                try {
                    $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
                    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $DB->prepare("INSERT INTO `like_info`(`img_id`, `acc_id`, `user`) VALUES (?, ?, ?)");
                    $stmt->execute([$img_id, $_SESSION['id'], $_SESSION['username']]);
                    try {
                        $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
                        $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $stmt = $DB->prepare("UPDATE `img_info` SET `likes`=? WHERE `img_id`=?");
                        $stmt->execute([$count[1] + 1, $img_id]);
                        echo "LIKE ACTIVATED";
                        try {
                            $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
                            $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $stmt = $DB->prepare("SELECT `notify` FROM `user_info` WHERE `acc_id`=?");
                            $stmt->execute([$count[0]]);
                            $fetch = $stmt->fetch();
                            if ($fetch[0] === '1') {
                                sendLikeNotif($_SESSION['id'], $img_id);
                            }
                        } catch (PDOException $e) {
                            throw $e;
                        }
                    } catch (PDOException $e) {
                        throw $e;
                    }
                } catch (PDOException $e) {
                    throw $e;
                }
            } catch (PDOException $e) {
                throw $e;
            }
        } else {
            try {
                echo "Pas vide";
                $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
                $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $DB->prepare("SELECT `likes` FROM `img_info` WHERE `img_id`=?");
                $stmt->execute([$img_id]);
                $count = $stmt->fetch();
                print_r($count);
                try {
                    $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
                    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $DB->prepare("DELETE FROM `like_info` WHERE `acc_id`=? AND `img_id`=?");
                    $stmt->execute([$_SESSION['id'], $img_id]);
                    try {
                        $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
                        $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $stmt = $DB->prepare("UPDATE `img_info` SET `likes`=? WHERE `img_id`=?");
                        $stmt->execute([$count[0] - 1, $img_id]);
                        echo "LIKE DELETED";
                    } catch (PDOException $e) {
                        throw $e;
                    }
                } catch (PDOException $e) {
                    throw $e;
                }
            } catch (PDOException $e) {
                throw $e;
            }
        }
    } catch (PDOException $e) {
        throw $e;
    }
}

function sendLikeNotif($sessid, $img_id)
{
    require "../config/database.php";
    include "../config/setup.php";
    try {
        $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
        $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $DB->prepare("SELECT `username` FROM `user_info` WHERE `acc_id`=?");
        $stmt->execute([$sessid]);
        $liker = $stmt->fetch();
        if (!empty($liker)) {
            $liker = $liker[0];
            try {
                $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
                $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $DB->prepare("SELECT `user` FROM `img_info` WHERE `img_id`=?");
                $stmt->execute([$img_id]);
                $picauthor = $stmt->fetch();
                if (!empty($picauthor)) {
                    $picauthor = $picauthor[0];
                    try {
                        $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
                        $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $stmt = $DB->prepare("SELECT `email` FROM `user_info` WHERE `username`=?");
                        $stmt->execute([$picauthor]);
                        $log = $stmt->fetch();
                        if (!empty($log)) {
                            try {
                                $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
                                $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                $stmt = $DB->prepare("SELECT `title` FROM `img_info` WHERE `img_id`=?");
                                $stmt->execute([$img_id]);
                                $fetch = $stmt->fetch();
                                if (!empty($fetch)) {
                                    $picauthor = $log[0];
                                    $fetch = $fetch[0];
                                    $from = "no-reply@camagru.com";
                                    if (mail($picauthor, "Someone is having success...",
                                        "Hello! We wanted you to know that $liker has liked one of the pic you posted! If you wonder which one, we can give you a clue: it's the one called '$fetch'!", "From: " . $from)) {
                                        echo "like mail send";
                                    }
                                }
                            } catch (PDOException $e) {
                                throw $e;
                            }
                        }
                    } catch (PDOException $e) {
                        throw $e;
                    }
                }
            } catch (PDOException $e) {
                throw $e;
            }
        }
    } catch (PDOException $e) {
        throw $e;
    }
}

// COMMENT PICTURES
function getCommented($img_id, $comment)
{
    require "../config/database.php";
    include "../config/setup.php";
    if (!$comment) {
        exit();
    }
    try {
        $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
        $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $DB->prepare("SELECT `username` FROM `user_info` WHERE `acc_id`=?");
        $stmt->execute([$_SESSION['id']]);
        $log = $stmt->fetch();
        if (!empty($log)) {
            try {
                $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
                $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $DB->prepare("SELECT `comments` FROM `img_info` WHERE `img_id`=?");
                $stmt->execute([$img_id]);
                $count = $stmt->fetch();
                try {
                    $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
                    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $DB->prepare("UPDATE `img_info` SET `comments`=? WHERE `img_id`=?");
                    $stmt->execute([$count[0] + 1, $img_id]);
                    echo "commented";
                    try {
                        $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
                        $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $stmt = $DB->prepare("INSERT INTO `com_info` (`img_id`, `acc_id`, `user`, `comments`) VALUES (?, ?, ?, ?)");
                        $stmt->execute([$img_id, $_SESSION['id'], $log[0], $comment]);
                        try {
                            $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
                            $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $stmt = $DB->prepare("SELECT `notify` FROM `user_info` WHERE `acc_id`=?");
                            $stmt->execute([$_SESSION['id']]);
                            $fetch = $stmt->fetch();
                            if ($fetch[0] === '1') {
                                sendComNotif($_SESSION['id'], $img_id);
                            }
                        } catch (PDOException $e) {
                            throw $e;
                        }
                    } catch (PDOException $e) {
                        throw $e;
                    }
                } catch (PDOException $e) {
                    throw $e;
                }
            } catch (PDOException $e) {
                throw $e;
            }
        }
    } catch (PDOException $e) {
        throw $e;
    }
}

function sendComNotif($user, $img_id)
{
    require "../config/database.php";
    include "../config/setup.php";
    try {
        $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
        $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $DB->prepare("SELECT `username` FROM `user_info` WHERE `acc_id`=?");
        $stmt->execute([$user]);
        $liker = $stmt->fetch();
        if (!empty($liker)) {
            try {
                $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
                $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $DB->prepare("SELECT `user` FROM `img_info` WHERE `img_id`=?");
                $stmt->execute([$img_id]);
                $picauthor = $stmt->fetch();
                if (!empty($picauthor)) {
                    $picauthor = $picauthor[0];
                    try {
                        $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
                        $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $stmt = $DB->prepare("SELECT `email` FROM `user_info` WHERE `username`=?");
                        $stmt->execute([$picauthor]);
                        $log = $stmt->fetch();
                        if (!empty($log)) {
                            try {
                                $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
                                $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                $stmt = $DB->prepare("SELECT `title` FROM `img_info` WHERE `img_id`=?");
                                $stmt->execute([$img_id]);
                                $fetch = $stmt->fetch();
                                if (!empty($fetch)) {
                                    $liker = $liker[0];
                                    $picauthor = $log[0];
                                    $fetch = $fetch[0];
                                    $from = "no-reply@camagru.com";
                                    if (mail($picauthor, "Someone is having success...",
                                        "Hello! We wanted you to know that $liker has commented one of the pic you posted! If you wonder which one, we can give you a clue: it's the one called '$fetch'!", "From: " . $from)) {
                                        echo "com mail send";
                                    }
                                }
                            } catch (PDOException $e) {
                                throw $e;
                            }
                        }
                    } catch (PDOException $e) {
                        throw $e;
                    }
                }
            } catch (PDOException $e) {
                throw $e;
            }
        }
    } catch (PDOException $e) {
        throw $e;
    }
}

// DELETING PICTURES
function deletePicture($img_id)
{
    require "../config/database.php";
    include "../config/setup.php";
    try {
        $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
        $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $DB->prepare("SELECT * FROM `user_info` WHERE `acc_id`=?");
        $stmt->execute([$_SESSION['id']]);
        $log = $stmt->fetch();
        if (!empty($log)) {
            try {
                $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
                $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $DB->prepare("SELECT `acc_id` FROM `img_info` WHERE `img_id`=?");
                $stmt->execute([$img_id]);
                $res = $stmt->fetch();
                if ($res[0] === $_SESSION['id']) {
                    try {
                        $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
                        $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $stmt = $DB->prepare("DELETE FROM `img_info` WHERE `img_id`=? AND `acc_id`=?");
                        $stmt->execute([$img_id, $_SESSION['id']]);
                        unlink("../pictures/$img_id.jpeg");
                        echo "deleted";
                    } catch (PDOException $e) {
                        exit();
                    }
                } else {
                   echo "Fail";
                   exit ();
                }
            } catch (PDOException $e) {
                exit();
            }
        }
    } catch (PDOException $e) {
        exit();
    }
}