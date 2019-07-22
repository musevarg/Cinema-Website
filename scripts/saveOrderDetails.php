<?php

require ('connect_db.php');

$userid = $_POST['uid'];
$movieid = $_POST['movid'];
$movieName = $_POST['movname'];
$movieTime = $_POST['movtime'];
$movieDate = $_POST['movdate'];
$tickets = $_POST['movtickets'];
$price = $_POST['price'];
$totalPrice = $_POST['totalprice'];

$userid = mysqli_escape_string($conn, $userid);
$movieid = mysqli_escape_string($conn, $movieid);
$movieName = mysqli_escape_string($conn, $movieName);
$movieTime = mysqli_escape_string($conn, $movieTime);
$movieDate = mysqli_escape_string($conn, $movieDate);
$tickets = mysqli_escape_string($conn, $tickets);
$price = mysqli_escape_string($conn, $price);
$totalPrice = mysqli_escape_string($conn, $totalPrice);

//echo $userid . ' ' . $movieid . ' ' . $movieName . ' ' . $movieTime. ' ' . $movieDate . ' ' . $ticket . ' ' . $price . ' ' . $totalPrice;


$q = "INSERT INTO orders (userID, movieID, movieName, movieTime, movieDate, tickets, price, totalPrice, dateBooked) VALUES ('$userid', '$movieid', '$movieName', '$movieTime', '$movieDate', '$tickets', '$price', '$totalPrice', NOW())";
$r = @mysqli_query ($conn, $q);
    if ($r)
    { 
    	echo 'Success';
    }
    else
    {
    	echo 'Nope';
    }

mysqli_close($conn);

?>