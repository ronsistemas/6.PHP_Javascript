<?php
include_once("settings.php");
if(!function_exists('connect')) {
function connect() {
    $pdo=false;
    try {
        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                            PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $pdo = new PDO(DB_DSN, DB_USER, DB_PASSWD, $opciones);
    } catch (PDOException $e) {
        //No se pudo conectar. $pdo=false;
    }
    return $pdo;
}

}