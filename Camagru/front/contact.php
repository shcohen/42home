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
    <link rel="stylesheet" href="../style/contact.css" type="text/css" media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<div class="grid-container" id="grid-container">
    <div class="header" id="header">
                        <h1>CAMAGRU</h1>
    </div>
    <div class="navbar">
        <a href="../index.php"><i class="fa fa-fw fa-home"></i> HOME</a>
        <a class="active" href="contact.php"><i class="fa fa-fw fa-envelope"></i> CONTACT</a>
        <a href="login.php"><i class="fa fa-fw fa-user"></i><?php if (!empty($_SESSION['username'])) { echo htmlspecialchars($_SESSION['username']); } else {?> LOGIN<?php }?></a>
        <?php
        if (isset($_SESSION['username'])) {
            echo '<a style="float: right;" href="../back/logout.php">LOGOUT</a>';
        }
        ?>
    </div>

    <div class="main">
        <div class="wrapper">
            <div class="box1">
                <div class="imgcontainer">
                    <img src="../assets/img_avatar2.jpg" alt="Avatar" class="avatar">
                    <img src="../assets/img_avatar1.jpg" alt="Avatar" class="avatar">
                    <img src="../assets/img_avatar.jpg" alt="Avatar" class="avatar">
                            <h2 class="h2">Meet the Team</h2>
                </div>
            </div>

        <div class="box2">
            <form action="../back/contactform.php" method="post">
                <div class="row">
                    <div class="col-25">
                        <label for="uname"><b>Username</b></label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="uname" name="uname" placeholder="Enter Username" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="country"><b>Country</b></label>

                    </div>
                    <div class="col-75">
                        <select id="country" name="country">
                            <option value="France">France</option>-->
                            <option value="Canada">Canada</option>
                            <option value="Hyrule">Hyrule</option>
                            <option value="Narnia">Narnia</option>
                            <option value="Middle Earth">Middle Earth</option>
                            <option value="Kaamelott">Kaamelott</option>
                            <option value="Westeros">Westeros</option>
                            <option value="Vulcan">Vulcan</option>
                            <option value="Naboo">Naboo</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="subject"><b>Subject</b></label>
                    </div>
                    <div class="col-75">
                        <textarea id="subject" name="subject" placeholder="Write something here..." style="height:200px" required></textarea>
                    </div>
                </div>
                <div class="row">
                    <button class="sub" type="submit" name="submit">Send Mail</button>
                </div>
            </form>
        </div>
    </div>
    </div>
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