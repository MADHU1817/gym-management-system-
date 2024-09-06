<?php
 session_start();
 if(!$_SESSION["userID"])
 {
   header("Location:trainer.login.php");
 }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="180x180" href="Resource/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="Resource/logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="Resource/logo.png">
    <link rel="manifest" href="Resource/favicon/site.webmanifest">
    <link rel="stylesheet" type="text/css" href="css/drecords_style.css">
    <link rel="stylesheet" type="text/css" href="css/aregister_style.css">
    <link rel="stylesheet" type="text/css" href="css/psearch_style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/jquery-ui-timepicker-addon.min.css" />

 

    <title>Records</title>
  </head>
  <body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/jquery-ui-timepicker-addon.min.js"></script>



    <div class="top_img"><img src="Resource/logo12.jpg"></div>
    <div class="navigation-bar" style="text-align: center">
      <a href="tdashboard.php" >Home</a>
      <a href="trecords.php">Records </a>
      <a href="tactivity.php">Activity</a>
      <a href="tinsert.php">Insert</a>
      <a class='logout' href="logout.php">Logout</a>
    </div>

    <script>
  jQuery(function($) {
      $("#date").datepicker();
  });
  </script>
  <script>
  jQuery(function($) {
      $("#date1").datepicker();
  });
  </script>
  <?php
   
    require "connection.php";

    $uid = $_SESSION["userID"];
     #user
    $sql = "SELECT * FROM user WHERE t_id='$uid'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<div class='welcome'><h2 class='mssg'> User Records </h2></div>
            <div class='table_box'>
                <table class='content-table'>
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th> Name</th>
                            <th>Gender</th>
                            <th>Date of Birth</th>
                            <th>Gmail</th>
                            <th>Phone NO</th>
                            <th>Address</th>
                            <th> Status</th>
                            <!-- Add other columns as needed -->
                        </tr>
                    </thead>
                    <tbody>";

        while ($row = mysqli_fetch_assoc($result)) {
            $userId = $row["u_id"];
            $Name = $row["name"];
            $gender = $row["gender"];
            $dob = $row["dob"];
            $gmail = $row["email"];
            $phone = $row["phone"];
            $address = $row["addrass"];
            $st = $row["status"];

            echo "
                <tr>
                    <td>$userId</td>
                    <td>$Name</td>
                    <td>$gender</td>
                    <td>$dob</td>
                    <td>$gmail</td>
                    <td>$phone</td>
                    <td>$address</td>
                    <td>$st</td>
                    <!-- Add other columns as needed -->
                </tr>";
        }

        echo "</tbody></table></div>";
    } else {
        echo "<div class='welcome'><h2 class='mssg'> No Activity Records Found </h2></div>";
    }


   
    echo "<div class='welcome'><h2 class='welcome_mssg'> Enter User ID</h2></div>
    <div class='input-form-box'>
      <form class='input-form' action='trecords.php' method='post'>
  
      <label for='did'>User ID</label>
      <input type='text' name='did' placeholder='Enter a valid User ID' required><br>
      
  
        <label for='date'>Date of Started</label>
      <input type='text' name='sdate' id='date' placeholder='From Date'><br>

      <label for='date1'>Date of End</label>
      <input type='text' name='edate' id='date1' placeholder='To Date'><br>

        <input type='submit' name='search-submit' value='Search'>
      </form>
  
    </div>";
  


?>



<?php
    if(isset($_POST["search-submit"])){
        $U_id=$_POST["did"];
    require "connection.php";

    $ud = $_SESSION["userID"];
    $newdate = date_create($_POST["sdate"]);
    $date = date_format($newdate, "Y-m-d");
    $new = date_create($_POST["edate"]);
    $d1 = date_format($new, "Y-m-d");
          $sql = "SELECT * FROM time WHERE u_id = '$U_id'  AND u_id IN (SELECT u_id FROM user WHERE t_id='$ud')";
          $result = mysqli_query($conn, $sql);

          if ($result) {
              echo "<div class='welcome'><h2 class='mssg'> Time Table Records </h2></div>
                  <div class='table_box'>
                      <table class='content-table'>
                          <thead>
                              <tr>
                                  <th>User ID</th>
                                  <th>Week</th>
                                  <th>Set_ID</th>
                                  <!-- Add other columns as needed -->
                              </tr>
                          </thead>
                          <tbody>";

              while ($row = mysqli_fetch_assoc($result)) {
                  $userId = $row["u_id"];
                  $duration = $row["week"];
                  $activityId = $row["set_num"];
                 

                  echo "
                      <tr>
                          <td>$userId</td>
                          <td>$duration</td>
                          <td>$activityId</td>
                         
                          <!-- Add other columns as needed -->
                      </tr>";
              }

              echo "</tbody></table></div>";
          } else {
              echo "<div class='welcome'><h2 class='mssg'> No Workout Records Found </h2></div>";
          }
          


        



      $sql = "SELECT * FROM workout WHERE u_id = '$U_id' AND date BETWEEN '$date' AND '$d1' AND u_id IN (SELECT u_id FROM user WHERE t_id='$ud')";
      $result = mysqli_query($conn, $sql);

      if ($result) {
          echo "<div class='welcome'><h2 class='mssg'> Workout Records </h2></div>
              <div class='table_box'>
                  <table class='content-table'>
                      <thead>
                          <tr>
                              <th>User ID</th>
                              <th>Duration</th>
                              <th>Activity ID</th>
                              <th>Date</th>
                              <!-- Add other columns as needed -->
                          </tr>
                      </thead>
                      <tbody>";

          while ($row = mysqli_fetch_assoc($result)) {
              $userId = $row["u_id"];
              $duration = $row["durations"];
              $activityId = $row["activity_id"];
              $date = $row["date"];

              echo "
                  <tr>
                      <td>$userId</td>
                      <td>$duration</td>
                      <td>$activityId</td>
                      <td>$date</td>
                      <!-- Add other columns as needed -->
                  </tr>";
          }

          echo "</tbody></table></div>";
      } else {
          echo "<div class='welcome'><h2 class='mssg'> No Workout Records Found </h2></div>";
      }
      


    }

    ?>

  </body>
</html>
