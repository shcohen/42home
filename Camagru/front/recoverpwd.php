<?php
session_start();
//if (isset($_SESSION['userID'])){
//    $id = $_SESSION['userID'];
//    // TODO: Verifier dans la DB si 'userID' existe
//
//} else {
//    header("Location: /front/login.php?error=accessdenied");
//    exit;
//}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Camagru</title>
    <meta charset="UTF-8">
    <link rel="icon" href="../assets/icon.png">
    <link rel="stylesheet" href="../style/index.css" type="text/css" media="screen">
    <link rel="stylesheet" href="../style/recoverpwd.css" type="text/css" media="screen">
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

    <div class="main">
        <div class="form">
            <ul class="tab-group">
                <li><a>Setting New Password</a></li>
            </ul>

            <br><br><br>

            <div class="tab-content">
                <div id="modify">
                    <h1>Hello <?php if (!empty($_SESSION['username'])) { echo htmlspecialchars($_SESSION['username']); }?>!</h1>
                    <form action="../back/modify.php" method="post">
                        <div class="field-wrap">
                            <input id="input" type="password" class="req" placeholder="Enter New Password" name="uname" required>
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
                        <div class="field-wrap">
                            <input id="myInput" class="req" type="password" placeholder="Repeat New Password" name="pwd" required>
                            <p id="texto" style="display: none; color: red;">WARNING : CAPS LOCK IS ON.</p>
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