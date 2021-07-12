<?php

$parkingQuery = "SELECT * FROM tbl_parking_201 WHERE parking_id= $currParkingId";
$parkingResult = mysqli_query($connection, $parkingQuery);
if(!$parkingResult) {
    die("DB query faileddd.");
}
$parkingRow = mysqli_fetch_assoc($parkingResult);




?>