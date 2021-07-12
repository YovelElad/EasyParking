<?php 
include "connection.php";
include "config.php";


$currId = $_GET["id"];
$currParkingId = $_GET["parking_id"];

    if(isset($_GET["out-of-use"]))
    {
        $parkingStatus = $_GET["out-of-use"];
        $query = "DELETE FROM tbl_parking_201 WHERE parking_id=" .$currParkingId. "";
        $result = mysqli_query($connection,$query);
        if(!$result)
            die("error");
    } 
    if(isset($_GET["report-status"]))
    {
        if($_GET["report-status"] == "false-alarm")
        {
            $query = "UPDATE tbl_parking_201 SET status=0 WHERE parking_id=" .$currParkingId. "";
            $result = mysqli_query($connection,$query);
                if(!$result)
               die("error");
        }
    }

header('Location: ' . mainListURL . '?id=' . $currId);
?>

<?php 
mysqli_close($connection);
?>