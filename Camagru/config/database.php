<?php

    $DB_DSN = "mysql:host=127.0.0.1";
    $DB_NAME = "camagru";
    $DB_DSNAME = "mysql:host=127.0.0.1;dbname=$DB_NAME;port=3306";
    $DB_USR = "root";
    $DB_PWD = "root";

    $DB_USER_INFO_CONTENT = "CREATE TABLE IF NOT EXISTS users (
    ID int NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    Username varchar(255) NOT NULL ,
    Email varchar(255) NOT NULL ,
    Password varchar(255) NOT NULL );";