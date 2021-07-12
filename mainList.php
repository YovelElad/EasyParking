<?php
include "connection.php";

$currId = $_GET["id"]; 
include "get_user_row.php";
// $user_role=$userRow["user_role"];

$available_parking_query = "SELECT * FROM tbl_parking_201 WHERE status=0 ORDER BY distance";
$available_parking_result = mysqli_query($connection, $available_parking_query);
if(!$available_parking_result) {
    die("DB query failed.");
}

$not_available_parking_query = "SELECT * FROM tbl_parking_201 WHERE status!=0 and status!=-1 ORDER BY distance";
$not_available_parking_result = mysqli_query($connection, $not_available_parking_query);
if(!$not_available_parking_result) {
    die("DB query failed.");
}

$reported_parking_query = "SELECT * FROM tbl_parking_201 WHERE status=-1 ORDER BY distance";
$reported_parking_result = mysqli_query($connection, $reported_parking_query);
if(!$reported_parking_result) {
    die("DB query failed.");
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Main List</title>
    <link rel="stylesheet" href="css/newStyle.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>

</head>


<body id="mainList">
    <div id="wrapper">

        <article id="willFade">

            <header>
                <?php include "hamburger.php" ?>

                <a id="logo" href="#">
                </a>

                <a class="clientPic" href="#">
                </a>

                <h1><b>בוקר טוב, <br>
                        <?php echo $userRow["user_name"] ?>
                    </b></h1>

                <nav>
                    <ul>
                        <a href="#">
                            <li class="selected">רשימה</li>
                        </a>
                        <?php echo '<a href="mainMap.php?id='.$currId.'"><li >מפה</li></a>'  ?>
                    </ul>
                    <img src="images/Line 1.png">
                </nav>
            </header>

            <?php 
            if($user_role != "admin")
            {
            echo '
            <section class="filter">
                <a id="openFiltering" class="filtering" href="#">סינון
                    <img class="filterExpand" src="images/expand_more.png">
                </a>
                <a id="closeFiltering" class="filtering" href="#">סינון
                    <img class="filterExpand" src="images/expand_more.png">
                </a>


                <a class="sort" id="openSort" href="#">הצג חניות
                    <img class="sortExpand" src="images/expand_more.png">
                </a>
                <a class="sort" id="closeSort" href="#">הצג חניות
                    <img class="sortExpand" src="images/expand_more.png">
                </a>

                <img class="refresh" src="images/10sec.png">
            </section>
            ';
            }
            ?>

            <main>

    <?php
    if($user_role != "admin"){
        echo '<section id="available_parking" class="parkingListSection">';
        echo "<ul id='parkingList'>";
        while($available_parking_row = mysqli_fetch_assoc($available_parking_result)){
            echo '<a href="main-object.php?id='.$currId.'&parking_id='.$available_parking_row["parking_id"].'">';
            echo '<li class="ListLi">';
            echo '<h2>'.$available_parking_row["parking_name"].' , תל אביב </h2>';
            echo '<p>מרחק: '.$available_parking_row["distance"].' ק"מ <br>זמן הגעה משוער: '.$available_parking_row["time"].' דקות</p>';
            echo '</li>';
            echo '<hr>';
            echo '</a>';
        }
        echo '</ul>';
        echo '</section>';

        echo '<section id="not_available_parking" class="parkingListSection">';
        echo "<ul id='parkingList'>";
        while($parkingRow = mysqli_fetch_assoc($not_available_parking_result)){
            echo '<a href="main-object.php?id='.$currId.'&parking_id='.$parkingRow["parking_id"].'">';
            echo '<li class="ListLi">';
            echo '<h2>'.$parkingRow["parking_name"].' , תל אביב </h2>';
            echo '<p>מרחק: '.$parkingRow["distance"].' ק"מ <br>זמן הגעה משוער: '.$parkingRow["time"].' דקות</p>';
            echo '</li>';
            echo '<hr>';
            echo '</a>';
        }
        echo '</ul>';
        echo '</section>';
    }   
    else 
    {
        echo '<section  class="parkingListSection">';
        echo "<ul id='parkingList'>";
        while($reported_parking_row = mysqli_fetch_assoc($reported_parking_result)){
            echo '<a href="report-page.php?id='.$currId.'&parking_id='.$reported_parking_row["parking_id"].'">';
            echo '<li class="ListLi">';
            echo '<h2>'.$reported_parking_row["parking_name"].' , תל אביב </h2>';
            echo '<p>מרחק: '.$reported_parking_row["distance"].' ק"מ <br>זמן הגעה משוער: '.$reported_parking_row["time"].' דקות</p>';
            echo '</li>';
            echo '<hr>';
            echo '</a>';
        }
        echo '</ul>';
        echo '</section>';

    }
        ?>
                <section id="filterNav" class="filterNav">
                    <ul>
                        <li>
                            <a href="#">הכל</a>
                            <img src="images/Line 2 small.png">
                        </li>
                        <li>
                            <a class="willChoose" href="#">מתחת ל-15 דק' נסיעה</a>
                            <img src="images/Line 2 small.png">
                        </li>
                        <li>
                            <a href="#">לתושבי תל אביב</a>
                            <img src="images/Line 2 small.png">
                        </li>
                        <li class="selected">
                            <a href="#">מעל הגודל:</a>

                        </li>
                        <img id="check1" src="images/check-mark-black-outline (1).png">
                        <input type="range" name="renge" min="3" max="7"><br><br>
                        <div id="slider"></div>

                    </ul>
                </section>

                <section id="sortNav" class="sortNav">
                    <ul>
                        <li>
                            <a id="available_parking_option" href="#">חניות פנויות</a>
                            <img src="images/Line 2 small.png">
                        </li>
                        <li>
                            <a id="not_available_parking_option" href="#">מתפנות בקרוב</a>
                            <img src="images/Line 2 small.png">
                        </li>
                        <img id="check2" src="images/check-mark-black-outline (1).png">
                    </ul>
                </section>
            </main>

            <footer>

                <?php if($user_role != "admin") {
                echo '<a id="search" href="search.php?id='.$currId.'">חיפוש
                <img src="images/search.png">
                </a>' ;
                }
                ?>

                <nav>
                    <ul>
                        <a href="#">
                            <li class="selected">רשימה</li>
                        </a>
                        <?php echo '<a href="mainMap.php?id='.$currId.'"><li>מפה</li></a>'  ?>
                    </ul>
                </nav>
                <img src="images/Line 1.png">
            </footer>
        </article>
        <?php include "personal_details.php"; ?>

    </div>
    <script src="js/personal_dtails_script.js"></script>
    <script src="js/get-user-location-script.js"></script>
    <script src="js/script.js"></script>
    <script src="js/hamburger-script.js"></script>
    <script src="js/filter-script.js"></script>
    <script>listColor();</script>
    <script>
        $(function () {
            $("#slider").slider();
        });
    </script>
</body>


</html>



<?php 
    mysqli_free_result($userResult);
    mysqli_free_result($available_parking_result);
    mysqli_free_result($not_available_parking_result);

    mysqli_close($connection);
?>