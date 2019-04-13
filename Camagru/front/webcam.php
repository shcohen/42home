<?php
session_start();
if (empty($_SESSION['id'])) {
    header("Location: /front/login.php?error=accessdenied");
    exit();
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
        <?php
        if (!empty($_SESSION['username'])) {
            echo "<a class=\"active\" href=\"/front/webcam.php\"><i class=\"fa fa-camera\"></i> POST</a>";
        } ?>
        <a href="/front/account.php"><i class="fa fa-fw fa-user"></i><?php if (!empty($_SESSION['username'])) { echo " ".htmlspecialchars($_SESSION['username']); } else {?> LOGIN<?php }?></a>
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
                    <i class="fa fa-file-image-o yo" aria-hidden="true" id="upload_button" onclick="displayUp(event)"></i>
<!--                    <label for="upload" id="upload_butt"><i class="fa fa-file-image-o yo" aria-hidden="true" id="upload_button" onclick="displayUp(event)"></i></label>-->
<!--                    <input id="upload" type="file" accept="image/*" style="display: none">-->
                </div> <!-- form -->
            </div> <!-- choose -->

            <div class="stickers">
                <div class="form">
                    <div class="tab-group">
                        <p>Filters and Stickers</p><br>
                        <i class="fa fa-paint-brush ya" aria-hidden="true" onclick="sticky()"></i>
                    </div> <!-- tab-group -->
                    <button class="button button-block xo" onclick="cancelSticky()">Cancel</button>
                </div> <!-- form -->
            </div> <!-- stickers -->

            <div class="webcam visi" id="webcam">
                <div class="form">

                    <div id="up" class="none">
                        <i class="fa fa-arrow-up" aria-hidden="true" style="font-size: 25px !important; margin-left: 287px;"></i>
                    </div> <!-- arrow-up -->

                    <video class="visi" id="video" autoplay style="width: 600px; height: 450px;"></video>

<!--                    <div id="left" class="none">-->
<!--                        <i class="fa fa-arrow-left" aria-hidden="true" style="font-size: 25px !important; margin-left: -33px"></i>-->
<!--                    </div>  arrow-left -->

                    <div id="Layer1" style="z-index:1">
                        <img id="img" class="none" src="">
                    </div> <!-- allow stickers to layer on top of the pic -->

                    <div id="Layer2" class="relative" style="z-index:2">
                        <img id="stickers" class="none" src="/assets/stickers/lightsaber.png">
                    </div> <!-- activate stickers -->

                    <canvas style="display:none;"></canvas>

                    <div id="down" class="none">
                        <i class="fa fa-arrow-down" aria-hidden="true" style="font-size: 25px !important; margin-left: 287px;"></i>
                    </div> <!-- arrow-down -->

                    <div class="butt">
                        <button class="button button-block" id="retake" onclick="displayPicDown()">Retake</button>
                        <button class="button button-block" id="screenshot" onclick="screenShot(); displayPicUp();">Screenshot</button>
                    </div> <!-- butt -->

                        <br><br>
                </div> <!-- form-->
            </div> <!-- webcam -->

            <div class="webcam none" id="upload">
                <div class="form">
                    <div style="width: 600px; height: 442px; background-color: red"></div>
                    <div class="butt">
                        <button type="submit" id="upload" name="submit" class="button button-block">Upload</button>
                    </div> <!-- butt -->
                        <br>
                </div> <!-- form-->
            </div> <!-- webcam -->

            <div class="previous">
                <div class="form">
                    <div class="tab-group">
                        <p>Previous Pictures</p>
                    </div>
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


