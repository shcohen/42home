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
//<div class="field-wrap">
//                            <p class="enable">Enable or disable notifications
//                                <input type="checkbox" id="notif" name="checkbox" value="checked" onclick="boxCheck()"></p>
//                            <script>
//                                function boxCheck() {
//                                    var x = document.getElementById("notif");
//                                    if (onclick){
//                                        x = document.classList.add("checked")
//                                    }
//                                    return (x.checked);
//                                }
//                            </script>
//                        </div> <!-- field-wrap -->
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Camagru</title>
    <meta charset="UTF-8">
    <link rel="icon" href="../assets/icon.png">
    <link rel="stylesheet" href="../style/index.css" type="text/css" media="screen">
    <link rel="stylesheet" href="../style/account.css" type="text/css" media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<div class="grid-container" id="grid-container">

    <div class="header" id="header"><h1>CAMAGRU</h1></div>

    <div class="navbar">
        <a href="../index.php"><i class="fa fa-fw fa-home"></i> HOME</a>
        <a href="contact.php"><i class="fa fa-fw fa-envelope"></i> CONTACT</a>
        <a class="active" href="account.php"><i class="fa fa-fw fa-user"></i><?php if (!empty($_SESSION['username'])) { echo htmlspecialchars($_SESSION['username']); } else {?> LOGIN<?php }?></a>
        <?php
        if (isset($_SESSION['username'])) {
            echo '<a style="float: right;" href="../back/logout.php">LOGOUT</a>';
        } ?>
    </div>

    <div class="main">

        <div class="form">

            <ul class="tab-group">
                <li><a>Modify Account Informations</a></li>
            </ul>

            <br><br><br>

            <div class="tab-content">
                <div id="modify">
                    <h1>Welcome Back <?php if (!empty($_SESSION['username'])) { echo htmlspecialchars($_SESSION['username']); }?>!</h1>
                    <form action="../back/modify.php" name="modify" onsubmit="return validateForm()" method="post">
                        <div class="field-wrap">
                            <input type="text" class="req" placeholder="Enter New Email" name="new_email">
                        </div> <!-- field-wrap -->
                        <div class="field-wrap">
                            <input type="text" class="req" placeholder="Enter New Username" name="new_uname">
                        </div> <!-- field-wrap -->
                        <div class="field-wrap">
                            <input id="myInput" class="req" type="password" placeholder="Enter New Password" name="new_pwd">
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
                        </div> <!-- field-wrap -->
                        <button type="submit" class="button button-block" name="signup-submit">Save Changes</button>
                            <script>
                                function validateForm() {
                                    var x = document.forms["modify"]["new_email"].value;
                                    var y = document.forms["modify"]["new_uname"].value;
                                    var z = document.forms["modify"]["new_pwd"].value;
                                    if (x == "" && y == "" && z == "") {
                                        alert("One of the fields must be filled out");
                                        return false;
                                    }
                                }
                            </script>
                    </form> <!-- form -->
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