<?php
include "connection.php";

$currId = $_GET["id"];
$currParkingId = $_GET["parking_id"];

include "get_user_row.php";
include "get_parking_row.php";

?>
<!DOCTYPE html>
<html>
 
<head>
    <title>After Choose</title>
    <link rel="stylesheet" href="css/newStyle.css">   
    <title>After Choose</title>
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/668019aaea.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="js/map-script-afterChoose.js"></script>
</head>

<body id="afterChoose">
    <div id="wrapper">
        <div id="willFade">

            <header>
                <?php include "hamburger.php" ?>
                <?php echo '<a id="logo" href="mainList.php?id='.$currId.'"></a>' ?>
                <a class="clientPic" href="#">
                <h1><b>בוקר טוב, <br> <?php echo $userRow["user_name"]; ?></b></h1>
                <nav>
                    <ul>
                        <a href="#">
                            <li class="selected">רשימה</li>
                        </a>
                        <a href="#">
                            <li>מפה</li>
                        </a>
                    </ul>
                    <img src="images/Line 1.png">
                </nav>
            </header>

            <div id="map"></div>
            <script async
                src="https://maps.googleapis.com/maps/api/js?key=**********************&callback=initMap">
            </script>
            <a href="#" class="report">
                <p>דווח</p>
            <?php echo "</a>"; ?>


            <footer>
                <article id="onMyWayTo">
                    <p>בדרך אל:</p>
                    <h2><?php echo $parkingRow["parking_name"]; ?></h2>
                </article>

                <article id="distance">
                    <p>מרחק:</p>
                    <h2><?php echo $parkingRow["distance"]; ?> ק"מ</h2>
                </article>

                <?php echo '<a href="mainList.php?id='.$currId.'" id="cancelParking">' ?>
                    <p>בטל חנייה</p>
                </a>
                <a href="#"><i class="fab fa-waze fa-2x" size:5x></i></a>
            </footer>
        </div>

        <section id="systemMessege" class="system-message">
            <h2>נשמח לדעת האם תצא בקרוב</h2>
            <form action = "after_parking.php?id=" .$currId>
                <input type ="hidden" name="id" value=<?php echo $currId?>>
                <input type ="hidden" name="parking_id" value=<?php echo $currParkingId?>>
                <label class="lable1">בחצי שעה הקרובה</label> <input class="lable1" type="radio" name="parking-time"
                    value="30min">
                <label class="lable2">בשעה הקרובה</label><input class="lable2" type="radio" name="parking-time"
                    value="60min">
                <label class="lable3">בשעתיים הקרובות</label><input class="lable3" type="radio" name="parking-time"
                    value="120min">
                <button type="submit" id="sendButton"></button>
                <button type="submit" id="dontSendButton"></button>
            </form>

            <h3 id="dontSend">לא ידוע</h3>
            <h3 id="send">שלח</h3>
            <p>* אם תצא בזמן שהקצבת, בפעם הבאה תוכל לשמור חנייה ל20 דקות!</p>

        </section>

        <div id="reportQuestion" class="system-message">
            <h2>האם אתה בטוח שברצונך לדווח על החנייה?</h2>
            <a id="sendReportButton" href="#"></a>
            <a id="dontSendReportButton" href="#"></a>

            <h3 id="sendReport">שלח</h3>
            <h3 id="dontSendReport">ביטול</h3>

        </div>
        <div id="reportSent" class="system-message">
            <h2>הדיווח נשלח בהצלחה!</h2>
            <?php echo '<a id="closeButton" href="send_report.php?id='.$currId.'&parking_id='.$currParkingId.'"></a>'  ?>
            <h3 id="close">סגור</h3>

        </div>
        <?php include "personal_details.php"; ?>

    </div>
    
<div id="dom-target" style="display: none;">
<?php 
    $output = $currId;
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