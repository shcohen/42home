<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Camagru</title>
    <link rel="icon" href="assets/icon.png">
    <link rel="stylesheet" href="style/index.css" type="text/css" media="screen">
    <link rel="stylesheet" href="test.css" type="text/css" media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<div>
    <div class="grid-container" id="grid-container">
        <div class="header" id="header">
            <!--        <h1 style="margin: 0;">CAMAGRU</h1>-->
        </div>

        <div class="navbar">
            <a class="active" href="index.php"><i class="fa fa-fw fa-home"></i> HOME</a>
            <a href="#"><i class="fa fa-fw fa-search"></i> SEARCH</a>
            <a href="front/contact.php"><i class="fa fa-fw fa-envelope"></i> CONTACT</a>
            <a href="front/login.php"><i class="fa fa-fw fa-user"></i> LOGIN</a>
        </div>

        <div class="main">
            <div class="contain">
                <div class="imgcontainer">
                    <img src="../assets/img_avatar2.jpg" alt="Avatar" class="avatar">
                    <img src="../assets/img_avatar1.jpg" alt="Avatar" class="avatar">
                    <img src="../assets/img_avatar.jpg" alt="Avatar" class="avatar">
                    <!--        <h1 style="text-align: center; margin-top: -90px">Meet our Team</h1>-->
                </div>
            </div>

            <div class="contain1">
                <form action="/action_page.php">
                    <h2 style="text-align: center">Want to share something with us?</h2>
                    <!--        <label for="email"><b>Email</b></label>-->
                    <!--        <input type="text" placeholder="Enter Email" name="email" required>-->

                    <label for="uname"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="uname" required>

                    <label for="country"><b>Location</b></label>
                    <select id="country" name="country">
                        <option value="france">France</option>
                        <option value="canada">Canada</option>
                        <option value="hyrule">Hyrule</option>
                        <option value="narnia">Narnia</option>
                        <option value="middle">Middle Earth</option>
                        <option value="westeros">Westeros</option>
                        <option value="vulcan">Vulcan</option>
                        <option value="naboo">Naboo</option>
                    </select>

                    <label for="subject"><b>Subject</b></label>
                    <textarea id="subject" name="subject" placeholder="Write something here..." style="height:200px"></textarea>

                    <input type="button" value="Cancel">
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
</div>

<div class="footer">
    <h1>
        <a href="#" class="fa fa-facebook"></a>
        <a href="#" class="fa fa-twitter"></a>
        <a href="#" class="fa fa-linkedin"></a>
    </h1>
</div>
</body>
</html>