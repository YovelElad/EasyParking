<?php
$currId = $_GET["id"];

include "connection.php";
include "get_user_row.php";
// $currId = $_GET["id"];
$parkingQuery = "SELECT * FROM tbl_parking_201 ORDER BY distance";
$parkingResult = mysqli_query($connection, $parkingQuery);
if(!$parkingResult) {
    die("DB query failed.");
}

?>



<!DOCTYPE html>
<html>

<head>
        <title>Search</title>
        <meta charset="UTF-8">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
                crossorigin="anonymous">
        <link rel="stylesheet" href="css/newStyle.css">
        <script src="js/script.js"></script>
        <script src="js/search-script.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
</head>

<body id="search-page">
        <section id="wrapper">
                <article id="willFade">
                        <header>
                                <?php echo '<a id="logo" href="mainList.php?id='.$currId.'"></a>' ?>
                                <!-- <a id="logo" href="mainList.php"></a> -->
                                <a class="clientPic" href="#"></a>
                                <form>
                                        <div class="mb-3">
                                                <input type="text" class="form-control" id="searchInput" name="name"
                                                        onkeyup="myFunction()">
                                        </div>
                                        <a id="search-btn" href="#"></a>
                                </form>
                                <?php include "hamburger.php"; ?>
                        </header>

                        <main>
                                <!-- <a href="#" id="homeSetIcon"></a>
                                <a href="#" id="workSetIcon"></a> -->
                                <ul id='parkingList'>
                                        <a href="#">
                                                <li class="ListLi" id="homeAddress">
                                                        <h2 class="homeWork">בית</h2>
                                                        <!-- <p>יוסף זימן 7, תל אביב</p> -->
                                                        <?php echo '<p>'.$userRow["street"].' '.$userRow["house"]. ', ' .$userRow["city"];  ?>
                                                        

                                                </li>
                                                
                                        </a>
                                        
                                        <a href="#">
                                                <li class="ListLi" id="homeAddress">
                                                        <h2 class="homeWork">עבודה</h2>
                                                        <p>דיזנגוף 256, תל אביב</p>
                                                </li>
                                        </a>

                                        <?php
                                while($parkingRow = mysqli_fetch_assoc($parkingResult)){
                                        echo '<a href="main-object.php?id='.$currId.'&parking_id='.$parkingRow["parking_id"].'">';
                                        echo    '<li class="ListLi">';
                                        echo            '<h2>'.$parkingRow["parking_name"].' , תל אביב </h2>';
                                        echo    '</li>';
                                        // echo    '<hr>';
                                        echo '</a>';
                                }
                                echo '</ul>';

                              ?>
                        </main>
                        <footer></footer>
                </article>
                <?php include "personal_details.php"; ?>
        </section>

        <script src="js/hamburger-script.js"></script>
        <script src="js/personal_dtails_script.js"></script>
        <script>
                myFunction();
                listColor();
                $(function () {
                        $("#slider").slider();
                });

        </script>
</body>

</html>