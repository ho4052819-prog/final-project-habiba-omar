<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "clothes_store";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed");
}

?>