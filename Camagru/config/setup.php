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
    $DB = new PDO($DB_DSN . 'dbname=' . $DB_NAME, $DB_USR, $DB_PWD);
    $stmt = $DB->query($DB_USER_INFO_CONTENT);
    $stmt->execute();
    try {
        $stmt = $DB->query("SHOW TABLES");
        $stmt->execute();
        $name = $stmt->fetch();
        print_r($name);
    } catch (PDOException $e) {
        throw $e;
    }
} catch (PDOException $e){
    throw $e;
}