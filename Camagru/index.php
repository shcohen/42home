<?php
session_start();
require "config/database.php";
include "config/setup.php";
try {
    $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $DB->prepare("SELECT * FROM `img_info`");
    $stmt->execute();
    $log = $stmt->fetchAll();
    if (!empty($log)) {
        try {
            $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
            $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $DB->prepare("SELECT * FROM `com_info`");
            $stmt->execute();
            $name = $stmt->fetchAll();
        } catch (PDOException $e) {
            header("Location: /front/index.php?error=database_error");
            exit();
        }
    }
} catch (PDOException $e) {
    header("Location: /front/index.php?error=database_error");
    exit();
} try {
    $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $DB->prepare("SELECT * FROM `like_info`");
    $stmt->execute();
    $fetch = $stmt->fetchAll();
} catch (PDOException $e) {
    echo $e;
} ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Camagru</title>
    <meta charset="UTF-8">
    <link rel="icon" href="assets/icon.png">
    <link rel="stylesheet" href="style/index.css" type="text/css" media="screen">
    <link rel="stylesheet" href="style/post.css" type="text/css" media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script async src="/js/like.js"></script>
</head>

<body>
<div class="grid-container" id="grid-container">

    <div class="header" id="header"><h1 class="title">CAMAGRU</h1></div>

    <div class="navbar">
        <a class="active" href="index.php"><i class="fa fa-fw fa-home"></i> HOME</a>
        <a href="front/contact.php"><i class="fa fa-fw fa-envelope"></i> CONTACT</a>
        <?php if (!empty($_SESSION['username'])) {
            echo "<a href=\"/front/webcam.php\"><i class=\"fa fa-camera\"></i> POST</a>"; } ?>
        <a href="front/login.php"><i class="fa fa-fw fa-user"></i><?php if (!empty($_SESSION['username'])) { echo " ".htmlspecialchars($_SESSION['username']); } else {?> LOGIN<?php }?></a>
        <?php if (isset($_SESSION['username'])) {
            echo '<a style="float: right;" href="back/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> LOGOUT</a>'; } ?>
    </div>

    <div class="main">
        <?php foreach ($log as $tab) { ?>
        <div class="form">
            <div class="comment">
                <div style="text-align: center"><i><?= $tab['date_creation']?></i></div>
                    <br>
                <div class="pseudo"><a><b><?= $tab['user'];?>:</b></a></div>
                <div class="comsg"><span><i><?= $tab['title']?></i></span>

                    <?php
                        $has_liked = false;
                        foreach ($fetch as $like) {
                            if ($like['img_id'] == $tab['img_id'] && $like['acc_id'] == $_SESSION['id']) {
                                $has_liked = true;
                            }
                        } ?>
                        <?php if (!$has_liked) { ?>
                            <div id='like' class='visi'><a id='like_but' class='fa fa-heart-o active' onclick='likeIt(event, "<?= $tab['img_id']?>")'> <?=$tab['likes'] ?></a></div>
                            <div id='liked' class='none'><a id='liked_but' class='fa fa-heart' onclick='likeDIt(event, "<?=$tab['img_id']?>")'> <?=$tab['likes']?></a></div>
                        <?php } else { ?>
                            <div id='like' class='none'><a id='like_but' class='fa fa-heart-o' onclick='likeDIt(event, "<?= $tab['img_id']?>")'> <?=$tab['likes'] ?></a></div>
                            <div id='liked' class='visi'><a id='liked_but' class='fa fa-heart active' onclick='likeIt(event, "<?=$tab['img_id']?>")'> <?=$tab['likes']?></a></div>
                        <?php } ?>
                </div> <!-- comsg -->
            </div> <!-- comment -->
                <hr>
            <div class="picture">
                    <img id="<?= $tab['img_id']?>" class="gallery" src="/pictures/<?=$tab['img_id']?>.jpeg">
            </div> <!-- picture -->
                <hr>
            <div class="comment">
                <?php foreach ($name as $arr) { if ($tab['img_id'] === $arr['img_id']) { ?>
                <div class="pseudo"><b><?= $arr['user']?></b></div>
                <div class="comsg"><span><?= $arr['comments']?></span></div>
                <?php } } ?>
            </div> <!-- comment -->
                <br>
            <div>
                <textarea id="comment"></textarea>
                <button class="button" type="submit" onclick="commenTed(event, '<?= $tab['img_id'] ?>'); return logComment();">Comment</button>
                    <script>
                        function logComment() {
                            <?php if (empty($_SESSION['username'])) { ?>
                                alert("You must be logged in to comment this post");
                                return false;
                            <?php } ?>
                        }
                    </script>
            </div>
        </div> <!-- form -->
        <?php } ?> <!-- $log as $tab -->
</div> <!-- main -->

<div class="footer">
    <h1>
        <a href="https://www.facebook.com/jinsere.mon.nom" class="fa fa-facebook"></a>
        <a href="https://fr.linkedin.com/in/linkedin" class="fa fa-linkedin"></a>
        <a href="https://www.twitter.com/alecsadier" class="fa fa-twitter"></a>
    </h1>
</div> <!-- footer -->

</div> <!-- grid container-->
</body>
</html>