<?php
$serverName = "database";
$db = "master_class";
$username = "root";
$password = "root";

try {
    $dbh = new PDO("mysql:host=$serverName;dbname=$db", $username, $password);
    // print_r('on est connecté à la db');
    $dbh->exec('set names utf8');     
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


} catch (PDOException $e) {
     die("Erreur !: " . $e->getMessage() . "<br/>");
   }
