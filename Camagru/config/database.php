<?php

    $DB_DSN = "mysql:host=localhost";
    $DB_DSNAME = "mysql:host=localhost;dbname=$DB_NAME;";
    $DB_USR = "root";
    $DB_PWD = "root";
    $DB_NAME = "camagru";

    $DB_USER_INFO_CONTENT = "CREATE TABLE IF NOT EXISTS users (
    ID int NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    Username varchar(255) NOT NULL ,
    Email varchar(255) NOT NULL ,
    Password varchar(255) NOT NULL );";