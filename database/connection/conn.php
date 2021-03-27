<?php
$user = "root";
$pass = "usbw";

try{
    $conn = new PDO("mysql:dbname=db_ruibank;server=localhost;port=3307", $user, $pass);
}
catch(Exception $e){
    echo $e;
}
