
<?php

$state = "insert";
$currId = $_GET["id"];
if($currId) {
    include "connection.php";
    include "get_user_row.php";
    $state = "edit";


}

?>




<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/newStyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
        crossorigin="anonymous">

</head>
<body id="register">
  <p id="pi"></p>
  <section id="wrapper">
    <!-- <a id="logo" href="#"></a> -->
    <?php 
      if($state == "edit")
          echo '<h1>עדכון פרטים אישיים</h1>';
      else 
          echo '<h1>דף הרשמה</h1>';

    ?>
    <!-- <h1>דף הרשמה</h1> -->
    <form action="get_params.php">
        <section id="register1">
        <input type="hidden" name="id" value="<?php echo $currId; ?>">

        <div class="mb-3">
            <label id="name" for="name" class="form-label">שם מלא:</label>
            <input type="text" class="form-control" id="nameInput" name="name" <?php if($state=="edit") echo 'value="'.$userRow["user_name"].'"'; else echo 'value=""';  ?> pattern="^[א-ת -]+$" required>
          </div>

          <div class="mb-3">
            <label id="password" for="password" class="form-label">סיסמא:</label>
            <input type="password" class="form-control" id="passwordInput" name="password" <?php if($state=="edit") echo 'value="'.$userRow["password"].'"'; else echo 'value=""';  ?> required>
          </div>

          <div class="mb-3">
            <label id="email" for="email" class="form-label">כתובת מייל:</label>
            <input type="email"  class="form-control" id="emailInput" name="email" <?php if($state=="edit") echo 'value="'.$userRow["mail"].'"'; else echo 'value=""';  ?>  rows="3"  placeholder="name@example.com" required></textarea>
          </div>

          

          <div class="mb-3">
            <label id="licensePlate" for="licensePlate" class="form-label">מספר רכב:</label>
            <input type="text"  class="form-control" id="licensePlateInput" name="licensePlate" <?php if($state=="edit") echo 'value="'.$userRow["license_plate"].'"'; else echo 'value=""';  ?> rows="3" pattern="[0-9]{2,3}-[0-9]{2,3}-[0-9]{2,3}" required></textarea>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="handicapped" value="">
            <label class="form-check-label" for="flexCheckDefault" id = "handiCappedText">
              בעל תו נכה
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="adminInput" name="admin" value="Driver">
            <label class="form-check-label" for="flexCheckDefault" >
              משתמש אדמין
            </label>
          </div>
          <input type="text" class="form-control" id="code" name="admin-code" value="" placeholder="הכנס קוד" disabled pattern="555" >


          <div class="col-auto">
            <button type="button" id="next" class="btn btn-primary mb-3">הבא</button>
          </div>

        </section>





        <section id="register2">
        <h2>פרטי כתובת</h2>
        <div class="mb-3">
            <label id="city" for="city" class="form-label">עיר:</label>
            <input type="text" class="form-control" id="cityInput" name="city" <?php if($state=="edit") echo 'value="'.$userRow["city"].'"'; else echo 'value=""';  ?>   pattern="^[א-ת -]+$" required>
          </div>

          
        <div class="mb-3">
            <label id="street" for="street" class="form-label">רחוב:</label>
            <input type="text" class="form-control" id="streetInput" name="street" <?php if($state=="edit") echo 'value="'.$userRow["street"].'"'; else echo 'value=""';  ?>  pattern="^[א-ת -]+$" required>
          </div>

          
        <div class="mb-3">
            <label id="hoseNo" for="hoseNo" class="form-label">מס' בית:</label>
            <input type="text" class="form-control" id="hoseNoInput" name="hoseNo" <?php if($state=="edit") echo 'value="'.$userRow["house"].'"'; else echo 'value=""';  ?> pattern="[0-9]{1,3}" required>
          </div>

          
        <div class="mb-3">
            <label id="zip" for="zip" class="form-label">מיקוד:</label>
            <input type="text" class="form-control" id="zipInput" name="zip" <?php if($state=="edit") echo 'value="'.$userRow["zip"].'"'; else echo 'value=""';  ?>   pattern="[0-9]+" required>
          </div>

          <div class="col-auto">
            <button type="submit" id = "submit" class="btn btn-primary mb-3">סיום</button>
          </div>

          <div class="col-auto">
            <button type="button" id="prev" class="btn btn-primary mb-3">הקודם</button>
          </div>
        </section>

        <input type="hidden" name="status" value="<?php echo $state; ?>">

    </form>
  </section>

  <script src="js/register-script.js"></script>
  <script>
      nextPage();
  </script>
</body>

</html>

<?php
if($state == "edit")
    mysqli_close($connection);

?>
