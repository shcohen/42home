<?php

include "database.php";

try {
    $DB = new PDO($DB_DSN, $DB_USR, $DB_PWD);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $DB->query("CREATE DATABASE IF NOT EXISTS $DB_NAME DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci");
    $stmt->execute();
} catch (PDOException $e) {
    throw $e;
}

try {
    $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $DB_USER_INFO_CONTENT;
    $DB->prepare($stmt)->execute();
    try {
        $stmt = $DB->query("SHOW TABLES");
        $stmt->execute();
        $name = $stmt->fetch();
    } catch (PDOException $e) {
        echo $e;
        throw $e;
    }
} catch (PDOException $e) {
    echo $e;
    throw $e;
}

try {
    $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $DB_IMG_INFO_CONTENT;
    $DB->prepare($stmt)->execute();
    try {
        $stmt = $DB->query("SHOW TABLES");
        $stmt->execute();
        $name = $stmt->fetch();
    } catch (PDOException $e) {
        echo $e;
        throw $e;
    }
} catch (PDOException $e) {
    echo $e;
    throw $e;
}