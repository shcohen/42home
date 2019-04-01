<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Camagru</title>
    <meta charset="UTF-8">
    <link rel="icon" href="assets/icon.png">
    <link rel="stylesheet" href="style/index.css" type="text/css" media="screen">
    <link rel="stylesheet" href="style/post.css" type="text/css" media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script async src="js/like.js"></script>
</head>

<body>
<div class="grid-container" id="grid-container">

    <div class="header" id="header">
                <h1 style="margin: 0;">CAMAGRU</h1>
    </div>

    <div class="navbar">
        <a class="active" href="index.php"><i class="fa fa-fw fa-home"></i> HOME</a>
        <a href="front/contact.php"><i class="fa fa-fw fa-envelope"></i> CONTACT</a>
        <a href="front/login.php"><i class="fa fa-fw fa-user"></i><?php if (!empty($_SESSION['username'])) { echo htmlspecialchars($_SESSION['username']); } else {?> LOGIN<?php }?></a>
        <?php
            if (isset($_SESSION['username'])) {
                echo '<a style="float: right;" href="back/logout.php">LOGOUT</a>';
            }
        ?>
    </div>

    <div class="main">
        <div class="form">
            <h1>WANTED: DEAD OR ALIVE</h1>
            <hr>
            <div class="picture">
                <img src="https://tse3.mm.bing.net/th?id=OIP.v8G-ag9ZeJJeNnppTfu7bQHaHc&pid=Api" style="width: 590px;height: 400px;">
            </div> <!-- picture -->
            <hr>
            <div class="comment">
                <div class="pseudo"><p><b>pseudo</b></p></div>
                <div class="comsg"><span>hello</span>
                    <div id="like" class="visi"><a id="like_but active" class="fa fa-heart-o" onclick="likeIt(event)"></a></div>
                    <div id="liked" class="none"><a id="liked_but" class="fa fa-heart" onclick="likeDIt(event)"></a></div>
                </div> <!-- comsg -->
            </div> <!-- comment -->

            <div class="comment">
                <div class="pseudo"><p><b>pseudo</b></p></div>
                <div class="comsg"><span>hello</span>
                    <div id="like" class="visi"><a id="like_but active" class="fa fa-heart-o" onclick="likeIt(event)"></a></div>
                    <div id="liked" class="none"><a id="liked_but" class="fa fa-heart" onclick="likeDIt(event)"></a></div>
                </div> <!-- comsg -->
            </div> <!-- comment -->

        </div> <!-- form -->

        <br><br><br><br><br>

        <div class="form">
        <h1 style="margin: 0">WANTED: DEAD OR ALIVE</h1>
        <hr>
        <div class="picture">
            <img src="https://tse3.mm.bing.net/th?id=OIP.v8G-ag9ZeJJeNnppTfu7bQHaHc&pid=Api" style="width: 350px;height: 350px;">
        </div>
        <hr>
            <div class="comment">
                <div class="pseudo"><p><b>pseudo</b></p></div>
                <div class="comsg"><span>hello</span>
                    <div id="like" class="visi"><a id="like_but active" class="fa fa-heart-o" onclick="likeIt()"></a></div>
                    <div id="liked" class="none"><a id="liked_but" class="fa fa-heart" onclick="likeDIt()"></a></div>
                </div> <!-- comsg -->
            </div> <!-- comment -->

            <div class="comment">
                <div class="pseudo"><p><b>pseudo</b></p></div>
                <div class="comsg"><span>hello</span>
                </div> <!-- comsg -->
            </div> <!-- comment -->
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