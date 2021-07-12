<?php
include "connection.php";
include 'config.php';

$currName           = mysqli_real_escape_string($connection,$_GET['name'        ]);
$currPassword       = mysqli_real_escape_string($connection,$_GET['password'    ]);
$currEmail          = mysqli_real_escape_string($connection,$_GET['email'       ]);
$currLicensePlate   = mysqli_real_escape_string($connection,$_GET['licensePlate']);
$currCity           = mysqli_real_escape_string($connection,$_GET['city'        ]);
$currStreet         = mysqli_real_escape_string($connection,$_GET['street'      ]);
$currHoseNo         = mysqli_real_escape_string($connection,$_GET['hoseNo'      ]);
$currZip            = mysqli_real_escape_string($connection,$_GET['zip'         ]);
if(isset($_GET['handicapped']))
    $currIsHandicapped  = "yes";
else 
    $currIsHandicapped = "no";
if(isset($_GET['admin']))
    $currIsAdmin        = "admin";
else 
    $currIsAdmin = "driver";

$currId = $_GET["id"];
$state  = $_GET["status"];
if($state == "insert"){
    $insertquery = "INSERT INTO tbl_users_201(user_name,password,mail,license_plate,city,street,house,zip,user_role) 
                    VALUES ('$currName','$currPassword','$currEmail','$currLicensePlate','$currCity','
                    $currStreet','$currHoseNo','$currZip','$currIsAdmin')";
}
else if($state == "edit"){
    $insertquery = "UPDATE tbl_users_201 SET user_name='$currName', password='$currPassword', mail='$currEmail', 
                    license_plate='$currLicensePlate', city='$currCity', street='$currStreet',
                    house='$currHoseNo', zip='$currZip ' WHERE user_id=$currId";
}

 

 $result = mysqli_query($connection, $insertquery);
?>


<!DOCTYPE html>
<html>
<head>

</head>
<body>
<?php
   if($result && $state == "insert") {
    header('Location: ' . loginURL);


    }
    else if($result && $state == "edit") {
        header('Location: ' . mainListURL . "?id=" . $currId);

    }
    else {
        echo "Error";
        echo $insertquery;

    }



?>
</body>
</html>



<?php 

    mysqli_close($connection);
?>