<?php 

include "connection.php";
include "config.php";

$currId = $_GET["id"];
$currParkingId = $_GET["parking_id"];

include "get_user_row.php";
include "get_parking_row.php";


$query = "UPDATE tbl_parking_201 SET status='-1' WHERE parking_id='$currParkingId'";
$result = mysqli_query($connection, $query);
// echo $query;


header('Location: ' . mainListURL . "?id=" . $currId);


?>

