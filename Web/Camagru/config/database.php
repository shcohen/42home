<?php

    $DB_DSN = "mysql:host=localhost;port=3306";
    $DB_NAME = "camagru";
    $DB_DSNAME = "mysql:host=localhost;dbname=$DB_NAME;port=3306";
    $DB_USR = "root";
    $DB_PWD = "rootroot";

    $DB_USER_INFO_CONTENT = "CREATE TABLE IF NOT EXISTS user_info (
        `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY ,
        `acc_id` varchar(255) NOT NULL ,
        `username` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
        `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
        `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
        `notify` boolean ,
        `validate` boolean
        );";

    $DB_IMG_INFO_CONTENT = "CREATE TABLE IF NOT EXISTS img_info (
        `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY ,
        `acc_id` varchar(255) NOT NULL ,
        `user` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
        `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
        `img_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
        `comments` int ,
        `likes` int ,
        `date_creation` datetime NOT NULL
        );";

    $DB_LIKE_INFO_CONTENT = "CREATE TABLE IF NOT EXISTS like_info (
		`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
		`img_id` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
		`acc_id` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
		`user` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
		);";

    $DB_COMMENT_INFO_CONTENT = "CREATE TABLE IF NOT EXISTS com_info (
		`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
		`img_id` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
		`acc_id` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
		`user` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
		`comments` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
		);";