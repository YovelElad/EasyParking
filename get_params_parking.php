<?php 

include "connection.php";
include "config.php";


$currId         = $_GET["id"];
$xValue         = mysqli_real_escape_string($connection,$_GET['xValue']);
$yValue         = mysqli_real_escape_string($connection,$_GET['yValue']);
$streetParking  = mysqli_real_escape_string($connection,$_GET['street-parking']);
$hoseNo         = mysqli_real_escape_string($connection,$_GET['hoseNo-parking']);
$sizeParking    = mysqli_real_escape_string($connection,$_GET['size-parking']);


$insertquery = "INSERT INTO tbl_parking_201(parking_name,x_pos,y_pos,parking_size)
                VALUES('$streetParking $hoseNo','$xValue','$yValue','$sizeParking')";


$result = mysqli_query($connection, $insertquery);


if($result) {
    header('Location: ' . mainMapURL. "?id=" . $currId."");
}
else{
    echo "Error";
}


mysqli_close($connection);

?>
