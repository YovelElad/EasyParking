<?php

    $currId = $_GET["id"];
    include "connection.php";
    include "get_user_row.php"; 

?>

    <!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/newStyle.css"> 
<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">


    <meta charset="UTF-8">
    <title>Personal Details</title>
</head>
<body id="personal_details">
    <section id="wrapper">
            <section id="systemMessege">

                <h1>פרטים אישיים</h1>
                <?php echo '<p id="name"><b>שם:</b> ' . $userRow["user_name"] .'</p>' ; ?>
                <?php echo '<p id="mail"><b>אימייל:</b> ' . $userRow["mail"] .'</p>';?>
                <?php echo '<p id="num"><b>מספר רכב:</b> ' . $userRow["license_plate"] . '</p>'; ?>
                <?php echo '<p id="address"><b>כתובת:</b> ' . $userRow["street"] . ' ' . $userRow["house"] . ', ' .$userRow["city"] . '</p>'; ?> 


                <?php echo '<a id="editButton" href="register.php?id='.$currId.'"></a>' ?>
                <a id="backButton" href="index.html"></a>
    
                <h3 id="edit">ערוך</h3>
                <h3 id="back">חזור</h3>
    
            </section>
    

    </section>
</body>
</html>


 <?php
    mysqli_free_result($userResult);
    mysqli_close($connection);
?>