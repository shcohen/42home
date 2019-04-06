<?php

    $DB_DSN = "mysql:host=localhost;port=3306";
    $DB_NAME = "camagru";
    $DB_DSNAME = "mysql:host=localhost;dbname=$DB_NAME;port=3306";
    $DB_USR = "root";
    $DB_PWD = "rootroot";

    $DB_USER_INFO_CONTENT = "CREATE TABLE user_info (
    ID int NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    acc_id varchar(32) NOT NULL ,
    username varchar(255) NOT NULL ,
    email varchar(255) NOT NULL ,
    password varchar(255) NOT NULL ,
    validate boolean);";