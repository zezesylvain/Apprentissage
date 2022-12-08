<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);
/*
session_destroy();
die();
//*/
$servername = 'localhost';
$user = 'root';
$mot2pass = 'Password';
$database = 'purphp';
//On essaie de se connecter
try {
    $db = new PDO("mysql:host=$servername;dbname=$database", $user, $mot2pass);
    //On définit le mode d'erreur de PDO sur Exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //die("<h2>Connexion établie </h2>");
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

include_once("class/Demarrage.php");
Demarrage::getListTables($db);
$uploadDir = dirname(__FILE__) . DIRECTORY_SEPARATOR . "upload" . DIRECTORY_SEPARATOR;
//die("<h2>Fin </h2>");