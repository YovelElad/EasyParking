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
    <title>
        <?php echo $parkingRow["parking_name"] ?>
    </title>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/newStyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>


    <title>Main Object</title>
</head>

<body id="main-object">
    <div id="wrapper">
        <main>
            <div id="willFade">
                <?php include "hamburger.php" ?>
                <?php echo '<a id="logo" href="mainList.php?id='.$currId.'"></a>' ?>
                <a href="#" class="clientPic"></a>
                <?php 
                echo '<h1 class="address">'.$parkingRow["parking_name"].' , תל אביב</h1>';
                if($parkingRow["status"] == 0)
                    echo '<a href="afterChoose.php?id='.$currId. '&parking_id='.$currParkingId.'" class="ellipse">P<p>לחץ לשמירת חניה</p></a>';
                else 
                    echo '<a id="not-available-parking" href="#" class="ellipse">P<p>לחץ לשמירת חניה</p></a>';
 
                ?>

                <section class="car"></section>
                <section class="p"></section>

                <div class="flipTimer">
                    <div class="days"></div>
                    <div class="hours"></div>
                    <div class="minutes"></div>
                    <div class="seconds"></div>
                </div>

                <section class="car-info">
                    <h6>סוג רכב:</h6>
                    <p>טויוטה קורולה</p>
                    <h6>גודל</h6>
                    <p>4.9 מטרים</p>
                </section>

                <section class="parking-info">
                    <h6>תל אביב:</h6>
                    <?php echo $parkingRow["parking_name"];  ?>
                    <h6>גודל חניה:</h6>
                    <p>5.6 מטרים</p>
                </section>

                <a href="#" class="report">
                    <p>דווח</p>
                </a>
            </div>

            <?php include "personal_details.php" ?>
            
            <section id="systemMessege" class="system-message">
                <h2>החנייה שבחרת תפוסה</h2>
                <p>נעדכן ברגע שתתפנה</p>
                <?php echo '<a id="okButton" href="mainList.php?id='.$currId.'"></a>' ?>
                <?php echo '<a id="cancelButton" href="#"></a>' ?>
                <h3 id="ok">אישור</h3>
                <h3 id="cancel">ביטול</h3>
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

        </main>
    </div>
    <script src="js/hamburger-script.js"></script>
    <script src="js/main-object-script.js"></script>
    <script src="js/personal_dtails_script.js"></script>

</body>

</html>

<?php 
    mysqli_free_result($userResult);
    mysqli_free_result($parkingResult);
    mysqli_close($connection);
?>