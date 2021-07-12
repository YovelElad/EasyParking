


<?php
include "connection.php";
$currId = $_GET["id"];
$currParkingId = $_GET["parking_id"];
// include "get_details.php";
include "get_user_row.php";
include "get_parking_row.php";



?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/newStyle.css">   
        <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">

        <title>Report Page</title>
    </head>

    <body id ="report">
        <div id ="wrapper">
            <main>
            <a id = "logo" href="#"></a>
            <form action="update-parking.php" method="GET">
                <h1>
                    מילוי טופס דיווח : <?php echo $parkingRow["parking_name"]; ?>, תל-אביב 
                </h1>

                <input type ="hidden" name="id" value=<?php echo $currId?>>
                <input type ="hidden" name="parking_id" value=<?php echo $currParkingId?>>


                <label class="false-alarm">דיווח שווא <input type="radio" name="report-status" value="false-alarm" checked = "checked"></label>
                <label class="true-alarm">דיווח אמת <input type="radio" name="report-status" value="true-alarm"></label>
                <label class="bad-sensor">חיישנים פגומים <input type="checkbox" name="report-consclosen" value="bad-sensor"> </label>
                <label class="no-access">אין גישה לחנייה <input type="checkbox" name="report-consclosen" value="no-access"></label>
                
                <h6>הוסף הערה:</h6>
                <textarea name="comment" rows="6" cols="30" placeholder="הוסף הערה:"></textarea>

                <label class="no-use">הורד חניה מזמינות<input type="checkbox" name="out-of-use" value="out"></label>

                
                <button type="submit" class = "send">שלח</button>

            </form>
        </main>
        </div>
        <script src = "js/report-script.js"></script>
    </body>
</html>


<?php 
    mysqli_free_result($userResult);
    mysqli_free_result($parkingResult);
    mysqli_close($connection);
?>