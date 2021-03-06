<?php
session_start();
if (!file_exists("../pictures")) {
    mkdir("../pictures", 0700);
} if (empty($_SESSION['id'])) {
    header("Location: /front/login.php?error=accessdenied");
    exit();
} else {
require "../config/database.php";
include "../config/setup.php";
try {
    $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $DB->prepare("SELECT `img_id` FROM `img_info` WHERE `acc_id`=?");
    $stmt->execute([$_SESSION['id']]);
    $log = $stmt->fetchAll();
    foreach ($log as $tab) {
        foreach ($tab as $key => $value) {
            if ($key === 'img_id') {
                unset($tab[$key]);
            } else {
                $arr[] = $value;
            }
        }
    }
} catch (PDOException $e) {
    header("Location: /front/webcam.php?error=database_error");
    exit();
} }
if (file_exists("../assets/stickers/")) {
    $array = [];
    $array = array_diff(scandir("../assets/stickers/"), array(".", ".."));
    $array = array_values($array);
} ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Camagru</title>
    <meta charset="UTF-8">
    <link rel="icon" href="/assets/icon.png">
    <link rel="stylesheet" href="/style/index.css" type="text/css" media="screen">
    <link rel="stylesheet" href="/style/webcam.css" type="text/css" media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script async src="/js/webcam.js"></script>
</head>
<body>

<div class="grid-container" id="grid-container">

    <div class="header" id="header"><h1 class="title">CAMAGRU</h1></div>

    <div class="navbar">
        <a href="/index.php"><i class="fa fa-fw fa-home"></i> HOME</a>
        <a href="/front/contact.php"><i class="fa fa-fw fa-envelope"></i> CONTACT</a>
        <a class="active" href="/front/webcam.php"><i class="fa fa-camera"></i> POST</a>
        <a href="/front/account.php"><i class="fa fa-fw fa-user"></i><?php if (!empty($_SESSION['username'])) {
                echo " " . htmlspecialchars($_SESSION['username']);
            } else { ?> LOGIN<?php } ?></a>
        <?php
        if (isset($_SESSION['username'])) {
            echo '<a style="float: right;" href="/back/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> LOGOUT</a>';
        } ?>
    </div>

    <div class="main">
        <div class="contain">
            <div class="choose">
                <div class="form">
                    <i class="fa fa-instagram yo" aria-hidden="true" id="webcam_button" onclick="startWebcam(); displayWeb()"></i>
                    <label for="upload" id="upload_button"><i class="fa fa-file-image-o yo" id="upload_button"></i></label>
                    <input id="upload" type="file" accept="image/*" style="display: none" onchange="displayUp(); uploadImage(event)" onload="displayUp();">
                </div> <!-- form -->
            </div> <!-- choose -->

            <div class="stickers">
                <div class="form">
                    <div class="tab-group">
                        <p>Filters and Stickers</p><br>
                        <i class="fa fa-paint-brush ya" id="sticky" value="0" aria-hidden="true" onclick="sticky('<?= urlencode(json_encode($array)) ?>'); displayButts()"></i>
                    </div> <!-- tab-group -->
                    <button class="button button-block xo" onclick="cancelSticky()">Cancel</button>
                </div> <!-- form -->
            </div> <!-- stickers -->

            <div class="webcam visi" id="webcam">
                <div class="form">

                    <div id="up" class="none">
                        <i class="fa fa-arrow-up" aria-hidden="true" onclick="moveUp()"></i>
                    </div> <!-- arrow-up -->

                    <div class="videos">
                        <div id="left" class="none">
                            <i class="fa fa-arrow-left" aria-hidden="true" onclick="moveLeft()"></i>
                        </div> <!-- arrow-left -->

                        <video class="visi" id="video" autoplay></video>

                        <div id="layer1" style="z-index:1;">
                            <img id="img" class="none" src="">
                        </div> <!-- allow stickers to layer on top of the pic -->

                        <canvas style="display:none;"></canvas>

                        <div id="right" class="none">
                            <i class="fa fa-arrow-right" aria-hidden="true" onclick="moveRight()"></i>
                        </div> <!-- arrow-right -->
                    </div> <!-- videos -->

                    <div id="down" class="none">
                        <i class="fa fa-arrow-down" aria-hidden="true" onclick="moveDown()"></i>
                    </div> <!-- arrow-down -->

                    <div class="butt">
                        <button class="button button-block none" id="retake" onclick="displayPicDown(); cancelTitle()">Retake</button>
                        <button class="button button-block none" id="screenshot" onclick="screenShot(); displayPicUp();">Screenshot</button>
                    </div> <!-- butt -->
                    <br>
                    <div class="none" id="green">
                        <br>
                        <input type="text" id="title" class="none" name="title" placeholder="Add your picture's legend here...">
                        <br>
                        <button class="button button-block xa" onclick="submit('submit')" id="submit">Submit</button>
                    </div>

                </div> <!-- form-->
            </div> <!-- webcam -->

            <div id="layer2" class="relative" style="z-index:2">
                <img id="stickers" style="top: 510px; left: 975px;" class="none" src="">
            </div> <!-- activate stickers -->

            <div class="webcam none" id="upload">
                <div class="form">

                    <input type="text" id="titleUp" class="none" name="title" placeholder="Add your picture's legend here...">

                    <div id="up2" class="none">
                        <i class="fa fa-arrow-up" aria-hidden="true" onclick="moveUp()"></i>
                    </div> <!-- arrow-up -->

                        <div id="left2" class="none">
                            <i class="fa fa-arrow-left" aria-hidden="true" onclick="moveLeft()"></i>
                        </div> <!-- arrow-left -->

                        <div id="layer1" style="z-index:1">
                            <img id="imgU" src="">
                        </div> <!-- allow stickers to layer on top of the pic -->

                        <canvas style="display:none;"></canvas>

                        <div id="right2" class="none">
                            <i class="fa fa-arrow-right" aria-hidden="true" onclick="moveRight()"></i>
                        </div> <!-- arrow-right -->

                    <div id="down2" class="none">
                        <i class="fa fa-arrow-down" aria-hidden="true" onclick="moveDown()"></i>
                    </div> <!-- arrow-down -->

                    <div class="butt">
                        <button type="submit" id="uploadbut" name="submit" class="button button-block" onclick="submit()">Upload</button>
                    </div> <!-- butt -->
                    <br><br>
                </div> <!-- form-->
            </div> <!-- webcam -->

            <div class="previous">
                <div class="form">
                    <div class="tab-group" id="previous">
                        <p>Previous Pictures</p>
                        <?php for ($i = count($arr) - 1; $i >= 0; $i--) { ?>
                                <img id="<?= $arr[$i]?>" class="oldpics" src='../pictures/<?=$arr[$i]?>.jpeg' onclick="deletePic(event)">
                        <?php } ?>
                    </div> <!-- tab-group -->
                </div> <!-- form -->
            </div> <!-- previous -->
        </div> <!-- contain -->
    </div> <!-- main -->

    <div class="footer">
        <h1>
            <a href="https://www.facebook.com/jinsere.mon.nom" class="fa fa-facebook"></a>
            <a href="https://fr.linkedin.com/in/linkedin" class="fa fa-linkedin"></a>
            <a href="https://www.twitter.com/alecsadier" class="fa fa-twitter"></a>
        </h1>
    </div>
</div> <!-- grid container -->
</body>
</html>