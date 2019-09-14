<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Camagru</title>
    <meta charset="UTF-8">
    <link rel="icon" href="/assets/icon.png">
    <link rel="stylesheet" href="/style/index.css" type="text/css" media="screen">
    <link rel="stylesheet" href="/style/contact.css" type="text/css" media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script async src="/js/like.js"></script>
</head>

<body>
<div class="grid-container" id="grid-container">

    <div class="header" id="header"><h1 class="title">CAMAGRU</h1></div>

    <div class="navbar">
        <a href="/index.php"><i class="fa fa-fw fa-home"></i> HOME</a>
        <a class="active" href="/front/contact.php"><i class="fa fa-fw fa-envelope"></i> CONTACT</a>
        <?php
        if (!empty($_SESSION['username'])) {
            echo "<a href=\"/front/webcam.php\"><i class=\"fa fa-camera\"></i> POST</a>";
        } ?>
        <a href="/front/login.php"><i class="fa fa-fw fa-user"></i><?php if (!empty($_SESSION['username'])) { echo " ".htmlspecialchars($_SESSION['username']); } else {?> LOGIN<?php }?></a>
        <?php
        if (isset($_SESSION['username'])) {
            echo '<a style="float: right;" href="/back/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> LOGOUT</a>';
        } ?>
    </div>

    <div class="main">
        <div class="form">
            <ul class="tab-group">
                <li><a>Contact Camagru's Team</a></li>
            </ul>

            <br><br>

            <div class="tab-content">
                <div id="modify">
                    <form action="/back/contactform.php" method="post">
                        <h1>How can we help you today?</h1><br>
                        <div class="field-wrap">
                            <input type="text" id="uname" placeholder="Enter Username" name="uname" required>
                        </div>
                        <div class="field-wrap">
                            <div>
                                <select id="country" name="country" required>
                                    <option selected disabled hidden>Choose Country</option>
                                    <option value="France">France</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Hyrule">Hyrule</option>
                                    <option value="Narnia">Narnia</option>
                                    <option value="Middle Earth">Middle Earth</option>
                                    <option value="Kaamelott">Kaamelott</option>
                                    <option value="Westeros">Westeros</option>
                                    <option value="Vulcan">Vulcan</option>
                                    <option value="Naboo">Naboo</option>
                                </select></div>
                        </div>
                        <div>
                            <textarea class="msg" id="subject" name="subject" placeholder="Write something here..." style="height:200px" required></textarea>
                        </div>
                        <br>
                        <button type="submit" class="button button-block" name="submit">Send Mail</button>
                    </form>
                </div>
            </div> <!-- tab-content -->
        </div> <!-- form -->
    </div>

    <div class="footer">
        <h1>
            <a href="https://www.facebook.com/jinsere.mon.nom" class="fa fa-facebook"></a>
            <a href="https://fr.linkedin.com/in/linkedin" class="fa fa-linkedin"></a>
            <a href="https://www.twitter.com/alecsadier" class="fa fa-twitter"></a>
        </h1>
    </div>

</div>
