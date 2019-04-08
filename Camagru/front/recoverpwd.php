<?php
session_start();
require "../config/database.php";
include "../config/setup.php";
try {
    $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $DB->prepare("SELECT * FROM `user_info` WHERE `acc_id`=?");
    $stmt->execute([$_GET['id_reset']]);
    $id = $stmt->fetch();
    if ($id['acc_id'] !== $_GET['id_reset']) {
        header("Location: /front/forgotpwd.php?error=access=denied");
        exit ();
    }
} catch (PDOException $e) {
    header("Location: /front/account.php?error=database_error");
    exit();
} if (!empty($_SESSION['id'])) {
    header("Location: /front/account.php?error=accessdenied");
    exit();
} ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Camagru</title>
    <meta charset="UTF-8">
    <link rel="icon" href="/assets/icon.png">
    <link rel="stylesheet" href="/style/index.css" type="text/css" media="screen">
    <link rel="stylesheet" href="/style/recoverpwd.css" type="text/css" media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<div class="grid-container" id="grid-container">

    <div class="header" id="header"><h1>CAMAGRU</h1></div>

    <div class="navbar">
        <a href="/index.php"><i class="fa fa-fw fa-home"></i> HOME</a>
        <a href="/front/contact.php"><i class="fa fa-fw fa-envelope"></i> CONTACT</a>
        <a class="active" href="/front/login.php"><i class="fa fa-fw fa-user"></i> LOGIN</a>
    </div>

    <div class="main">
        <div class="form">
            <ul class="tab-group">
                <li><a>Setting New Password</a></li>
            </ul>

            <br><br><br>

            <div class="tab-content">
                <div id="modify">
                    <h1>Hello!</h1>
                    <form action="/back/modify.php?id_reset=<?= $_GET['id_reset']?>" method="post">
                        <div class="field-wrap">
                            <input id="input" type="password" class="req" placeholder="Enter New Password" name="new_pwd" required>
                            <p id="text" style="display: none; color: red;">WARNING: CAPS LOCK IS ON.</p>
                            <script>
                                var input = document.getElementById("input");
                                var text = document.getElementById("text");
                                input.addEventListener("keyup", function(event) {
                                    if (event.getModifierState("CapsLock")) {
                                        text.style.display = "block"; }
                                    else {
                                        text.style.display = "none" }
                                });
                            </script>
                        </div>
                        <div class="field-wrap">
                            <input id="myInput" class="req" type="password" placeholder="Repeat New Password" name="check" required>
                            <p id="texto" style="display: none; color: red;">WARNING: CAPS LOCK IS ON.</p>
                            <script>
                                var input = document.getElementById("myInput");
                                var text = document.getElementById("texto");
                                input.addEventListener("keyup", function(event) {
                                    if (event.getModifierState("CapsLock")) {
                                        text.style.display = "block"; }
                                    else {
                                        text.style.display = "none" }
                                });
                            </script>
                        </div>
                        <button type="submit" class="button button-block" name="signup-submit">Save Changes</button>
                    </form>
                </div>
            </div> <!-- tab-content -->
        </div> <!-- form -->
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