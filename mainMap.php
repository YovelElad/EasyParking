<?php

include "connection.php";

$currId = $_GET["id"]; 
include "get_user_row.php";


$parkingQuery = "SELECT * FROM tbl_parking_201 ORDER BY distance";
$parkingResult = mysqli_query($connection, $parkingQuery);
if(!$parkingResult) {
    die("DB query failed.");
}

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/newStyle.css">   
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <title>Main Map</title>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>

  <script src="js/map-script.js"></script>

</head>
 
<body id="mainMap">
    
<section id="wrapper">
    <div id="willFade">
        <header>
            <?php include "hamburger.php" ?>
            
            <a id="logo" href="#">
            </a>

            <a class="clientPic" href="#">
            </a>

            <h1><b>בוקר טוב, <br> <?php echo $userRow["user_name"] ?></b></h1>

            <nav>
                <ul>
                <?php echo '<a href="mainList.php?id='.$currId.'"><li >רשימה</li></a>'  ?>
                <a href="#"><li class="selected">מפה</li></a>
                </ul>
                <img src="images/Line 1.png">
            </nav>

        </header>
        <div id="map"></div>
        <script async
            src="https://maps.googleapis.com/maps/api/js?key=*************************callback=initMap">
        </script>


        <footer>

            <a id="search" href="#">חיפוש
                <img src="images/search.png">
            </a>

            <nav>
               <ul>
                   <?php echo '<a href="mainList.php?id='.$currId.'"><li >רשימה</li></a>'  ?>
                <a href="#"><li class="selected">מפה</li></a>
               </ul>
            </nav>
            <img src="images/Line 1.png">

        </footer>
    </div>
    <?php include "personal_details.php"; ?>

</section>


<div id="dom-target" style="display: none;">
<?php 
    $output = $currId;
    echo htmlspecialchars($output);
?>
</div>
<div id="user_role" style="display: none;">
<?php 
    $output = $user_role;
    echo htmlspecialchars($output);
?>
</div>
<script src="js/personal_dtails_script.js"></script>
<script src="js/hamburger-script.js"></script>

</body>
</html>


<?php 
    mysqli_free_result($userResult);
    mysqli_free_result($parkingResult);
    mysqli_close($connection);
?>