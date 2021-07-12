<?php
include "connection.php";

$userQuery = "SELECT * FROM tbl_users_201 WHERE user_id = $currId" ;
$userResult = mysqli_query($connection, $userQuery);
if(!$userResult) {
    die("DB query failed.");
}
$userRow = mysqli_fetch_assoc($userResult);

$parkingQuery = "SELECT * FROM tbl_parking_201 WHERE parking_id= $currParkingId";
$parkingResult = mysqli_query($connection, $parkingQuery);
if(!$parkingResult) {
    die("DB query faileddd.");
}
$parkingRow = mysqli_fetch_assoc($parkingResult);


?>