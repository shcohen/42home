<?php

include "database.php";

try {
    $DB = new PDO($DB_DSN, $DB_USR, $DB_PWD);
    $stmt = $DB->query("CREATE DATABASE IF NOT EXISTS $DB_NAME");
    $stmt->execute();
} catch (PDOException $e) {
    throw $e;
}

try {
    $DB = new PDO($DB_DSNAME, $DB_USR, $DB_PWD);
    $stmt = $DB_USER_INFO_CONTENT;
    $DB->prepare($stmt)->execute();
    echo "YO";
    try {
        echo "1";
        $stmt = $DB->query("SHOW TABLES");
        echo "2";
        $stmt->execute();
        echo "3";
        $name = $stmt->fetch();
        print_r($name);
        echo "4";
    } catch (PDOException $e) {
        echo $e;
    }
} catch (PDOException $e) {
    echo $e;
}