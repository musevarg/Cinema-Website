<?php

$servername = "localhost";
$username = "u969528694_kino";
$password = "kino123";
$dbname = "u969528694_kino";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>