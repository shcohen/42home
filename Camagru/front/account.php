<?php
session_start();
if (empty($_SESSION['id'])) {
    header("Location: /front/login.php?error=accessdenied");
    exit();
} try {
    require "../config/database.php";
    include "../config/setup.php";
    $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $DB->prepare("SELECT `notify` FROM `user_info` WHERE `acc_id`=?");
    $stmt->execute([$_SESSION['id']]);
    $log = $stmt->fetch();
} catch (PDOException $e) {
    header("Location: /front/account.php?error=database_error");
} ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Camagru</title>
    <meta charset="UTF-8">
    <link rel="icon" href="/assets/icon.png">
    <link rel="stylesheet" href="/style/index.css" type="text/css" media="screen">
    <link rel="stylesheet" href="/style/account.css" type="text/css" media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script async src="/js/notification.js"></script>
</head>

<body>
<div class="grid-container" id="grid-container">

    <div class="header" id="header"><h1 class="title">CAMAGRU</h1></div>

    <div class="navbar">
        <a href="/index.php"><i class="fa fa-fw fa-home"></i> HOME</a>
        <a href="/front/contact.php"><i class="fa fa-fw fa-envelope"></i> CONTACT</a>
        <a class="active" href="/front/account.php"><i class="fa fa-fw fa-user"></i><?php if (!empty($_SESSION['username'])) { echo " ".htmlspecialchars($_SESSION['username']); } else {?> LOGIN<?php }?></a>
        <?php
        if (isset($_SESSION['username'])) {
            echo '<a style="float: right;" href="/back/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> LOGOUT</a>';
        } ?>
    </div>

    <div class="main">

        <div class="form">

            <ul class="tab-group">
                <li><a>Modify Account Informations</a></li>
            </ul>

            <br>

            <div class="tab-content">
                <div id="modify">
                    <h1>Welcome Back <?php if (!empty($_SESSION['username'])) { echo htmlspecialchars($_SESSION['username']); }?>!</h1>
                    <br>
                    <div class="checkbox">
                        <label class="notif" for="notif">Enable or Disable Notifications</label>
                        <input type="checkbox" id="notif" onclick="enableNotif()" <?php if ($log['notify'] === '1') {echo "checked";} ?>>
                    </div> <!-- checkbox -->
                    <form action="/back/modify.php" name="modify" method="post">
                        <div class="field-wrap">
                            <input type="text" class="req" placeholder="Enter New Email" name="new_email">
                        </div> <!-- field-wrap -->
                        <div class="field-wrap">
                            <input type="text" class="req" placeholder="Enter New Username" name="new_uname">
                        </div> <!-- field-wrap -->
                        <div class="field-wrap">
                            <input id="myInput" class="req" type="password" placeholder="Enter New Password" name="pwd">
                            <p id="text" style="display: none; color: red;">WARNING: CAPS LOCK IS ON.</p>
                                <script>
                                    var input = document.getElementById("myInput");
                                    var text = document.getElementById("text");
                                    input.addEventListener("keyup", function(event) {
                                        if (event.getModifierState("CapsLock")) {
                                            text.style.display = "block"; }
                                        else {
                                            text.style.display = "none" }
                                    });
                                </script>
                        </div> <!-- field-wrap -->
                        <div class="field-wrap">
                            <input id="input" class="req" type="password" placeholder="Repeat New Password" name="new_check">
                            <p id="texto" style="display: none; color: red;">WARNING: CAPS LOCK IS ON.</p>
                            <script>
                                var input = document.getElementById("input");
                                var text = document.getElementById("texto");
                                input.addEventListener("keyup", function(event) {
                                    if (event.getModifierState("CapsLock")) {
                                        text.style.display = "block"; }
                                    else {
                                        text.style.display = "none" }
                                });
                            </script>
                        </div> <!-- field wrap -->
                        <button type="submit" class="button button-block" name="signup-submit">Save Changes</button>
                    </form> <!-- formulaire -->
                </div> <!-- modify -->
            </div> <!-- tab-content -->
        </div> <!-- /form -->
    </div> <!-- main -->

    <div class="footer">
        <h1>
            <a href="https://www.facebook.com/jinsere.mon.nom" class="fa fa-facebook"></a>
            <a href="https://fr.linkedin.com/in/linkedin" class="fa fa-linkedin"></a>
            <a href="https://www.twitter.com/alecsadier" class="fa fa-twitter"></a>
        </h1>
    </div>
</div>
</body>

</html>