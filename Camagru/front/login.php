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
    <link rel="stylesheet" href="../style/login.css" type="text/css" media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<div class="grid-container" id="grid-container">
    <div class="header" id="header">
        <!--        <h1 style="margin: 0;">CAMAGRU</h1>-->
    </div>
    <div class="navbar">
        <a class="active" href="../index.php"><i class="fa fa-fw fa-home"></i> HOME</a>
        <a href="contact.php"><i class="fa fa-fw fa-envelope"></i> CONTACT</a>
        <a href="login.php"><i class="fa fa-fw fa-user"></i><?php if (!empty($_SESSION['username'])) { echo htmlspecialchars($_SESSION['username']); } else {?> LOGIN<?php }?></a>
    </div>

    <div class="main">
        <div class="wrapper">

            <div class="box1"><h1>SIGN IN HERE</h1>
                    <hr>
                <div class="imgcontainer">
                    <img src="../assets/img_avatar2.jpg" alt="Avatar" class="avatar">
                    <img src="../assets/img_avatar.jpg" alt="Avatar" class="avatar">
                </div>
                    <br><br>
                <form action="../back/user.php" method="POST">

                    <div class="yo1" style="background-color: green">
                        <b>Username</b>
                        <input type="text" placeholder="Enter Username" name="uname" required>
                            <br><br>
                        <b>Password</b>
                        <input id="myInput" type="password" placeholder="Enter Password" name="psw" required>
                            <br><br>
                        <b>Repeat Password</b>
                        <input id="myInput" type="password" placeholder="Repeat Password" name="psw" required>
                            <br>
                <p id="text" style="display: none; color: red;">WARNING : CAPS LOCK IS ON.</p>
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
            </div>
                <br><label><input type="checkbox" checked="checked" name="remember"> Remember me</label>
                <br><br><br><hr>
                <p><a href="#" style="color:dodgerblue">Forgot your password ?</a></p>
                <button type="submit">Sign In</button>
                </form>
            </div>


            <div class="box2"><h1>SIGN UP HERE</h1>
                    <hr>
                <div class="imgcontainer">
                    <img src="../assets/img_avatar.jpg" alt="Avatar" class="avatar">
                    <img src="../assets/img_avatar2.jpg" alt="Avatar" class="avatar">
                </div>
                    <br><br>
                <form action="../back/user.php " method="POST">

                <div class="yo2" style="background-color: green">
                    <b>Email</b>
                    <input type="text" placeholder="Enter Email" name="email" required>
                        <br><br>
                    <b>Username</b>
                    <input type="text" placeholder="Enter Username" name="uname" required>
                        <br><br>
                    <b>Password</b>
                    <input id="input" type="password" placeholder="Enter Password" name="psw" required>
                        <br><br>
                    <b>Repeat Password</b>
                    <input id="input" type="password" placeholder="Repeat Password" name="psw" required>
                        <br>
                <p id="text" style="display: none; color: red;">WARNING : CAPS LOCK IS ON.</p>
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

                    <br><hr>
                <p>By creating an account you agree to our <a href="terms.php" style="color:dodgerblue">Terms & Privacy</a>.</p>
                <button type="submit">Sign Up</button>
                </form>
            </div>
        </div>
    </div>

    <div class="footer">
        <h1>
            <a href="https://www.facebook.com/jinsere.mon.nom" class="fa fa-facebook"></a>
            <a href="https://www.twitter.com/alecsadier" class="fa fa-twitter"></a>
            <a href="#" class="fa fa-linkedin"></a>
        </h1>
    </div>
</div>
</body>

</html>