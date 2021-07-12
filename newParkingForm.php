<?php
include "connection.php";
$currId = $_GET["id"];

?>


<!DOCTYPE html>
<html>

<head>
  <title>Add Parking</title>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
  <link id="cssReplace" rel="stylesheet" type="text/css" href="css/style-admin-map.css" />
  <script src="js/admin-map-script.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body id="register">
  <section id="wrapper">
    <section id="admin-map">

      <form action="get_params_parking.php">
        <input id="pac-input" class="controls" type="text" placeholder="Search Box" name="address" />

        <input type="hidden" name="id" value=<?php echo $currId?>>
        <input type="text" class="form-control" id="xValue" name="xValue"></textarea>
        <input type="text" class="form-control" id="yValue" name="yValue"></textarea>
        <div class="col-auto">
          <button type="button" id="next" class="btn btn-primary mb-3">הבא</button>
        </div>
    </section>

    <section id="admin-form">
      <h1>יצירת חניה</h1>
      <div class="mb-3">
        <label id="street" for="street" class="form-label">רחוב:</label>
        <input type="text" class="form-control" id="streetInput" name="street-parking" pattern="^[א-ת -]+$" required>
      </div>

      <div class="mb-3">
        <label id="hoseNo" for="hoseNo" class="form-label">מס' בית:</label>
        <input type="text" class="form-control" id="hoseNoInput" name="hoseNo-parking" pattern="[0-9]{1,3}" required>
      </div>

      <div class="mb-3">
        <label id="zip" for="zip" class="form-label">גודל:</label>
        <input type="text" class="form-control" id="zipInput" name="size-parking" pattern="[0-9.]+" required>
      </div>



      <div class="col-auto">
        <button type="submit" id="submit" class="btn btn-primary mb-3">סיום</button>
      </div>
    </section>




    <div id="map"></div>


  </section>

  <script
    src="https://maps.googleapis.com/maps/api/js?key=***************&libraries=places&v=weekly"
    async></script>
</body>

</html>

<?php 
    mysqli_close($connection);
?>