
<?php
include "connection.php";
include 'config.php';

if(!empty($_GET["name"])) {
  $query = "SELECT * FROM tbl_users_201 WHERE user_name='"
  . $_GET["name"]
  . "' and password='"
  . $_GET["password"]
  ."'";
  
  $result = mysqli_query($connection , $query);
  $row = mysqli_fetch_array($result);

  if(is_array($row)){
    header('Location: ' . URL . '?id=' . $row["user_id"]);
  } else {
      $message = "שם משתמש או סיסמא שגויים";
  }
}


?>





<!DOCTYPE html>
<html>

    <head>
    <title>Login</title>
    <link rel="icon" href="favicon-16x16.png">
      <meta charset="UTF-8">
        <link rel="stylesheet" href="css/newStyle.css">
        <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
            rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
            crossorigin="anonymous">
    </head>

    <body id="firstPage">
        <section id="wrapper">
            <a id="logo" href="#"></a>
            <h1> ברוכים הבאים</h1>

            <form action="#" method="GET">

                <div class="mb-3">
                    <label id="id" for="name" class="form-label">שם משתמש:</label>
                    <input type="text" class="form-control" id="nameInput" name="name" >
                  </div>

                  <div class="mb-3">
                    <label id="password" for="password" class="form-label">סיסמא:</label>
                    <input type="password"  class="form-control" id="passwordInput" name="password" rows="3"></textarea>
                  </div>

                  <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">כניסה</button>
                  </div>
                  <div class="error-message"><?php if(isset($message)) { echo $message; } ?></div>
            </form>

            <a href="register.php?id=">משתמש חדש? לחץ להרשמה</a>
        </section>

    </body>
</html> 


<?php 
    mysqli_close($connection);
?>

