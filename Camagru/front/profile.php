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
    <link rel="stylesheet" href="../style/post.css" type="text/css" media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script async src="../js/like.js"></script>
</head>

<body>
<div class="grid-container" id="grid-container">

    <div class="header" id="header">
        <h1>CAMAGRU</h1>
    </div>

    <div class="navbar">
        <a class="active" href="../index.php"><i class="fa fa-fw fa-home"></i> HOME</a>
        <a href="contact.php"><i class="fa fa-fw fa-envelope"></i> CONTACT</a>
        <a href="login.php"><i class="fa fa-fw fa-user"></i><?php if (!empty($_SESSION['username'])) { echo htmlspecialchars($_SESSION['username']); } else {?> LOGIN<?php }?></a>
        <?php
        if (isset($_SESSION['username'])) {
            echo '<a style="float: right;" href="../back/logout.php">LOGOUT</a>';
        }
        ?>
    </div>

<!--
recuperer toute les image dans la bdd
- toute les info seront sous forme de tableau
- tu fais une boucles ForEache sur ce tableau
- tu affcihe chaque elem avec toutes les info associer
-->

    <div class="main">
        <div class="form">
            <div class="comment">
                <div class="pseudo"><a href="profile.php"><b>username:</b></a></div>
                <div class="comsg"><span>"The Legend of Zelda"</span>
                    <div id="like" class="visi"><a id="like_but" class="fa fa-heart-o active" onclick="likeIt(event)"> 21</a></div>
                    <div id="liked" class="none"><a id="liked_but" class="fa fa-heart" onclick="likeDIt(event)"> 22</a></div>
                </div> <!-- comsg -->
            </div> <!-- comment -->
            <hr>
            <div class="picture">
                <img src="https://tse3.mm.bing.net/th?id=OIP.v8G-ag9ZeJJeNnppTfu7bQHaHc&pid=Api" style="width: 590px;height: 400px;">
            </div> <!-- picture -->
            <hr>
            <div class="comment">
                <div class="pseudo"><a href="profile.php"><b>username:</b></a></div>
                <div class="comsg"><span>comment</span></div>
            </div> <!-- comment -->
            <div class="comment">
                <div class="pseudo"><a href="profile.php"><b>username:</b></a></div>
                <div class="comsg"><span>comment</span></div>
            </div> <!-- comment -->
            <br>
            <textarea></textarea>
            <button class="addcomment" type="submit">Comment</button>
        </div> <!-- form -->

        <br><br><br><br><br>

        <!-- NEXT POST -->

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


