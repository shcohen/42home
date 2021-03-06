<?php
require_once ("../back/user_info.php");
session_start();
if (!empty($_SESSION['username'])) {
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
    <link rel="stylesheet" href="/style/login.css" type="text/css" media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script async src="/js/login.js"></script>
</head>

<body>
<div class="grid-container" id="grid-container">

    <div class="header" id="header"><h1 class="title">CAMAGRU</h1></div>

    <div class="navbar">
        <a href="/index.php"><i class="fa fa-fw fa-home"></i> HOME</a>
        <a href="/front/contact.php"><i class="fa fa-fw fa-envelope"></i> CONTACT</a>
        <a class="active" href="/front/login.php"><i class="fa fa-fw fa-user"></i><?php if (!empty($_SESSION['username'])) { echo htmlspecialchars($_SESSION['username']); } else {?> LOGIN<?php }?></a>
        <?php
            if (isset($_SESSION['username'])) {
                echo '<a style="float: right;" href="/back/logout.php">LOGOUT</a>';
            }
        ?>
    </div>

    <div class="main">

        <div class="form">

            <ul class="tab-group">
                <li id="signup_button" class="tab active"><a onclick="displaySignUp()">Sign Up</a></li>
                <li id="signin_button" class="tab"><a onclick="displaySignIn()">Sign In</a></li>
            </ul>

            <div class="tab-content">
                <div id="signup" class="visi">
                    <h1>Nice to meet you!</h1>
                    <form action="/back/user_info.php" method="post">
                        <div class="field-wrap">
                            <input type="text" class="req" placeholder="Enter Email" name="email" required>
                        </div>
                        <div class="field-wrap">
                            <input type="text" class="req" placeholder="Enter Username" name="username" required>
                        </div>
                        <div class="field-wrap">
                            <input id="myInput" class="req" type="password" placeholder="Enter Password" name="pwd" required>
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
                        </div>
                        <div class="field-wrap">
                            <input id="inputo" class="req" type="password" placeholder="Repeat Password" name="rpwd" required>
                            <p id="texto" style="display: none; color: red;">WARNING: CAPS LOCK IS ON.</p>
                            <script>
                                var input = document.getElementById("inputo");
                                var text = document.getElementById("texto");
                                input.addEventListener("keyup", function(event) {
                                    if (event.getModifierState("CapsLock")) {
                                        text.style.display = "block"; }
                                    else {
                                        text.style.display = "none" }
                                });
                            </script>
                        </div>
                        <p class="forgot">By creating an account you agree to our <a href="/front/terms.php" style="color: #777777;">Terms & Privacy.</a></p>
                        <button type="submit" class="button button-block" name="signup-submit">Get Started</button>
                    </form>
                </div>

                <div id="signin" class="none">
                    <h1>Glad to see you again!</h1>
                    <form action="/back/user_info.php" method="post">
                        <div class="field-wrap">
                            <input type="text" placeholder="Enter Username" name="uname" required>
                        </div>
                        <div class="field-wrap">
                            <input id="myInputi" class="req" type="password" placeholder="Enter Password" name="pwd" required>
                            <p id="texti" style="display: none; color: red;">WARNING : CAPS LOCK IS ON.</p>
                            <script>
                                var input = document.getElementById("myInputi");
                                var text = document.getElementById("texti");
                                input.addEventListener("keyup", function(event) {
                                    if (event.getModifierState("CapsLock")) {
                                        text.style.display = "block"; }
                                    else {
                                        text.style.display = "none" }
                                });
                            </script>
                        </div>
                        <p class="forgot"><a href="/front/forgotpwd.php" style="color: #777777;">Forgot Password?</a></p>
                        <button type="submit" class="button button-block" name="signin-submit">Let's Go</button>
                    </form>
                </div>

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