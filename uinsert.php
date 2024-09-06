<?php
 session_start();
 if(!$_SESSION["userID"])
 {
   header("Location:doctor.login.php");
 }
 ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="apple-touch-icon" sizes="180x180" href="Resource/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="Resource/logo.png">
  <link rel="icon" type="image/png" sizes="16x16" href="Resource/logo.png">
  <link rel="manifest" href="Resource/favicon/site.webmanifest">
  <link rel="stylesheet" type="text/css" href="css/dinsert_style.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/jquery-ui-timepicker-addon.min.css" />
  <title> Insert </title>
</head>
<body>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/jquery-ui-timepicker-addon.min.js"></script>

  <div class="top_img"><img src="Resource/logo12.jpg"></div>
  <div class="navigation-bar" style="text-align: center">
    <a href="udashboard.php" >Home</a>
    <a href="urecords.php">Records </a>
    <!--<a href="dsearch.php">Search</a>-->
    <a href="uinsert.php">Insert</a>
    <a class='logout' href="logout.php">Logout</a>
  </div>

  <script>
  jQuery(function($) {
      $("#date").datepicker();
  });
  </script>

  <script>
  jQuery(function($) {
      $("#time").timepicker({
        timeFormat: "hh:mm tt"
      });
  });
</script>



  <?php
  if (isset($_GET["error"]))
   {
    if($_GET["error"]=="wronguser")
    {
      echo "<div class='welcome' style='color: #D61A3C'><h2 class='welcome_mssg'> Wrong User ID </h2></div>";
    }
  }
  elseif (isset($_GET["login"])) {
      if ($_GET["login"]=="success") {
        echo "<div class='welcome' style='color: #97DC21'><h2 class='welcome_mssg'> Record Saved Successfully </h2></div>";
      }
    }
  elseif(!isset($_POST["choice-submit"])){
      echo "<div class='welcome'><h2 class='welcome_mssg'> Choose a Category</h2></div>
      <div class='choice_form_box'>
        <form class='choice_form' action='uinsert.php' method='post'>
          <label for='ch'>Nutrition</label>
          <input type='checkbox' name='ch' value='1'><br>
          <label for='ch'>Weight</label>
          <input type='checkbox' name='ch' value='2'><br>
          <label for='ch'>Work Out</label>
          <input type='checkbox' name='ch' value='3'><br>
          <input type='submit' name='choice-submit' value='NEXT'>
        </form>
      </div>";
    }

    else {
      if ($_POST["ch"]=="1") {
        echo "<div class='welcome'><h2 class='welcome_mssg'> Daily Nutrition Form</h2></div>
  <div class='input-form-box'>
    <form class='input-form' action='uinsert_nut.php' method='post'>


      <label for='date'>Date</label>
      <input type='text' name='date' id='date' placeholder='Enter Date' required><br>


      <label for='proteins'>Proteins</label>
      <textarea name='proteins' placeholder='Enter proteins Quantity in grams'></textarea><br>

      <label for='calories'>Calories</label>
      <textarea name='calories' placeholder='Enter calories Quantity in grams' ></textarea><br>

      <input type='submit' name='input-submit' value='Save'>
    </form>

  </div>";
      }
      elseif ($_POST["ch"]=="2") {
          echo "  <div class='welcome'><h2 class='welcome_mssg'> Weight Form</h2></div>
  <div class='input-form-box'>
    <form class='input-form' action='uinsert_w.php' method='post'>
      
      <label for='date'>Date</label>
      <input type='text' name='date' id='date' placeholder='Enter Date' required><br>

      
      <label for='weight'>Weight</label>
      <textarea name='weight' placeholder='Enter Weight'></textarea><br>

      <input type='submit' name='input-submit' value='Save'>
    </form>

  </div>";
      }

      elseif ($_POST["ch"]=="3") {
        echo "  <div class='welcome'><h2 class='welcome_mssg'> Daily Work Out Form</h2></div>
  <div class='input-form-box'>
    <form class='input-form' action='uinser_wor.php' method='post'>
      
      <label for='date'>Date</label>
      <input type='text' name='date' id='date' placeholder='Enter Date' required><br>

      
      <label for='duration'>Duration</label>
      <input type='text' name='duration' placeholder='Work Out Duration in Minits ' required><br>

      <label for='activity'>Activity</label>
      <textarea name='activity' placeholder='Enter Valid Activity ID' required ></textarea><br>

      <input type='submit' name='input-submit' value='Save'>
    </form>

  </div>";
      }
    }
 ?>



</body>
</html>
