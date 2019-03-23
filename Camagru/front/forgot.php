<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Camagru</title>
    <meta charset="UTF-8">
    <link rel="icon" href="../assets/icon.png">
    <link rel="stylesheet" href="../style/index.css" type="text/css" media="screen">
    <link rel="stylesheet" href="../style/forgot.css" type="text/css" media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<div class="grid-container" id="grid-container">

    <div class="header" id="header">
        <!--                <h1 style="margin: 0;">CAMAGRU</h1>-->
    </div>

    <div class="navbar">
        <a href="../index.php"><i class="fa fa-fw fa-home"></i> HOME</a>
        <a href="contact.php"><i class="fa fa-fw fa-envelope"></i> CONTACT</a>
        <a class="active" href="login.php"><i class="fa fa-fw fa-user"></i><?php if (!empty($_SESSION['username'])) { echo htmlspecialchars($_SESSION['username']); } else {?> LOGIN<?php }?></a>
    </div>

    <div class="main"></div>

    <div class="footer"><h1>
            <a href="https://www.facebook.com/jinsere.mon.nom" class="fa fa-facebook"></a>
            <a href="https://fr.linkedin.com/in/linkedin" class="fa fa-linkedin"></a>
            <a href="https://www.twitter.com/alecsadier" class="fa fa-twitter"></a>
        </h1></div>

</div>
</body>

</html>