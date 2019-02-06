<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Camagru</title>
    <link rel="icon" href="assets/icon.png">
    <link rel="stylesheet" href="style/index.css" type="text/css" media="screen">
    <link rel="stylesheet" href="style/login.css" type="text/css" media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="start"><p class="title">CAMAGRU</p></div>
<div class="navbar"><ul>
        <li class="dropdown"><a class="dropbtn" href="index.php"><i class="fa fa-fw fa-home"></i>HOME</a></li>
        <li class="dropdown"><a class="dropbtn" href="#"><i class="fa fa-fw fa-search"></i>SEARCH</a></li>
        <li class="dropdown"><a class="dropbtn" href="login.php"><i class="fa fa-fw fa-user"></i>USER</a></li>
        <li class="dropdown"><a class="dropbtn" href="contact.php"><i class="fa fa-fw fa-envelope"></i>CONTACT</a></li>
</ul></div>

<div class="contain">
    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Sign In</button>
    <div id="id01" class="modal">
        <form class="modal-content animate" action="/action_page.php">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                <img src="assets/img_avatar2.jpg" alt="Avatar" class="avatar">
            </div>
            <div class="container">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required>
                <label for="psw"><b>Password</b></label>
                <input id="myInput" type="password" placeholder="Enter Password" name="psw" required>
                <p id="text" style="display: none; color: red;">WARNING : CAPS LOCK IS ON.</p>
                <script>
                    var input = document.getElementById("myInput");
                    var text = document.getElementById("text");
                    input.addEventListener("keyup", function(event) {
                        if (event.getModifierState("CapsLock")) {
                            text.style.display = "block";
                        } else {
                            text.style.display = "none"
                        }
                    });
                </script>
                <button type="submit">Sign In</button>
<!--                <label>-->
<!--                    <input type="checkbox" checked="checked" name="remember"> Remember me-->
<!--                </label>-->
            </div>
            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                <span class="psw"><a href="#">Forgot password ?</a></span>
            </div>
        </form>
    </div>
    <script>
        var modal = document.getElementById('id01');
        window.onclick = function(event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        } // When the user clicks anywhere outside of the modal, it closes it
    </script>

    <button onclick="document.getElementById('id02').style.display='block'" style="width:auto; float: right;">Sign Up</button>
    <div id="id02" class="modal">
        <form class="modal-content animate" action="/action_page.php">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
            </div>

            <div class="container" style="align-content: center">
                <h1 style="text-align: center">SIGNING UP</h1>
                <h2 style="text-align: center">Please fill in this form to create an account.</h2>
                <hr>
                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" required>

                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>

                <label for="psw"><b>Password</b></label>
                <input id="nput" type="password" placeholder="Enter Password" name="psw" required>
                <p id="text" style="display: none; color: red;">WARNING : CAPS LOCK IS ON.</p>
                <script>
                    var input = document.getElementById("nput");
                    var text = document.getElementById("text");
                    input.addEventListener("keyup", function(event) {
                        if (event.getModifierState("CapsLock")) {
                            text.style.display = "block";
                        } else {
                            text.style.display = "none"
                        }
                    });
                </script>
                <p style="text-align: center">By creating an account you agree to our <a href="terms.php" style="color:dodgerblue">Terms & Privacy</a>.</p>
                <div class="clearfix">
                    <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn1">Cancel</button>
                    <button type="submit" class="signupbtn1">Sign Up</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        var modal1 = document.getElementById('id02');
        window.onclick = function(event) {
            if (event.target === modal1) {
                modal1.style.display = "none";
            }
        }
    </script>
</div>
</body>
</html>