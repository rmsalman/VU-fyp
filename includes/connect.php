<?php
$server     = "localhost";
$user       = "root";
$pass       = "";
$db         = 'vu';

$conn = mysqli_connect($server,$user,$pass, $db);

$mysqli = new mysqli($server, $user, $pass, $db);
if(!$conn){
    echo 'Not connected';
}


session_start();



?>