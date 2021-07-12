<?php

include "connection.php";
$currId = $_GET["id"];
include "get_user_row.php";
$user_role=$userRow["user_role"];



if($user_role != "admin") 
    $query ="SELECT * FROM tbl_parking_201 WHERE status=0";
else 
    $query ="SELECT * FROM tbl_parking_201 WHERE status=-1";

$result = mysqli_query($connection, $query);
$numResults = mysqli_num_rows($result);
$counter = 0;
echo '[{"counter":' . $numResults . '},';
while($row = mysqli_fetch_assoc($result)) {
    $counter++;
    echo '{';
    echo '"id":'.   $row["parking_id"]  . ','   ;
    echo '"x":' .   $row["x_pos"]       . ','   ;
    echo '"y":' .   $row["y_pos"]               ;
    if($counter != $numResults)
        echo '},';
}
echo '}]';

    

mysqli_close($connection);

?>
