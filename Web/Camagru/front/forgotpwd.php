<?php
session_start();
if (!empty($_SESSION['id'])) {
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
    <link rel="stylesheet" href="/style/forgotpwd.css" type="text/css" media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<div class="grid-container" id="grid-container">

    <div class="header" id="header"><h1 class="title">CAMAGRU</h1></div>

    <div class="navbar">
        <a href="/index.php"><i class="fa fa-fw fa-home"></i> HOME</a>
        <a href="/front/contact.php"><i class="fa fa-fw fa-envelope"></i> CONTACT</a>
        <a class="active" href="/front/login.php"><i class="fa fa-fw fa-user"></i> LOGIN</a>
    </div>

    <div class="main">
        <div class="form">
            <ul class="tab-group">
                <li><a>Recovering Data</a></li>
            </ul>

            <br><br>

            <div class="tab-content">
                <div id="modify">
                    <h1>You will receive an email allowing you to reset your password.</h1> <br>
                    <form action="/back/modify.php" method="post">
                        <div class="field-wrap">
                            <input type="text" class="req" placeholder="Enter Email" name="reco_email" required>
                        </div> <!-- field wrap -->
                        <button type="submit" class="button button-block" name="signup-submit">Send Mail</button>
                    </form>
                </div> <!-- modify -->
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