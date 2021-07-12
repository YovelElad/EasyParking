<?php 
include "connection.php";
include "config.php";


$currId = $_GET["id"];
$currParkingId = $_GET["parking_id"];

include "get_user_row.php";
include "get_parking_row.php";

$insertQuery = "INSERT INTO tbl_user_parking_201 VALUES('$currId','$currParkingId')";

$pakringTime = $_GET["parking-time"];
if($pakringTime == "30min") {
    $query = "UPDATE tbl_parking_201 SET status = '1' WHERE parking_id = $currParkingId"; 
}
else if($pakringTime == "60min")
    $query = "UPDATE tbl_parking_201 SET status = '2' WHERE parking_id = $currParkingId";
else if($pakringTime == "120min")
    $query = "UPDATE tbl_parking_201 SET status = '3' WHERE parking_id = $currParkingId";
else
    $query = "UPDATE tbl_parking_201 SET status = '4' WHERE parking_id = $currParkingId";

    $insertResult = mysqli_query($connection,$insertQuery);
    $result = mysqli_query($connection,$query);
    if($result && $insertQuery) {
        header('Location: ' . mainListURL . '?id=' . $currId . '&parking_id=' .$currParkingId);
    }
    else{
        echo "error";
    }

?>


<?php 
mysqli_close($connection);
?>