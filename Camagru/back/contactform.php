<?php

if (isset($_POST['submit'])){
    $username = $_POST['uname'];
    $country = $_POST['country'];
    $msg = $_POST['subject'];

    $from = "no-reply@camagru.com";
    $mailTo = "shcohen@student.42.fr";
    $headers = "From: ".$from;
    $subject = $username." from ".$country." has a message for you!";


    mail($mailTo, $subject, $msg, $headers);
    header("Location: ../front/contact.php?success=emailsend");
}