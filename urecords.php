<?php
 session_start();
 if(!$_SESSION["userID"])
 {
   header("Location:doctor.login.php");
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

<style>
	
  </style>

    <title>Records</title>
  </head>
  <body>


    <div class="top_img"><img src="Resource/logo12.jpg"></div>
    <div class="navigation-bar" style="text-align: center">
      <a href="udashboard.php" >Home</a>
      <a href="urecords.php">Records </a>
      <!--<a href="dsearch.php">Search</a>-->
      <a href="uinsert.php">Insert</a>
      <a class='logout' href="logout.php">Logout</a>
    </div>
   
    <?php
      require "connection.php";
     

      $uid=$_SESSION["userID"];
     
      #Nutrition
      $sql = "SELECT * FROM nutrition  WHERE u_id = '$uid'";
      $result = mysqli_query($conn, $sql);

      if ($result) {
          echo "<div class='welcome'><h2 class='mssg'> Nutrition Records </h2></div>
              <div class='table_box'>
                  <table class='content-table'>
                      <thead>
                          <tr>
                              <th>User ID</th>
                              <th>Proteins</th>
                              <th>Calories</th>
                              <th>Date</th>
                              
                              <!-- Add other columns as needed -->
                          </tr>
                      </thead>
                      <tbody>";

          while ($row = mysqli_fetch_assoc($result)) {
              $userId = $row["u_id"];
              $proteins = $row["proteins"];
              $calories = $row["calories"];
              $date = $row["date"];
             
              
              echo "
                  <tr>
                      <td>$userId</td>
                      <td>$proteins</td>
                      <td>$calories</td>
                      <td>$date</td>
            
                      <!-- Add other columns as needed -->
                  </tr>";
          }

          echo "</tbody></table></div>";
      } else {
          echo "<div class='welcome'><h2 class='mssg'> No Nutrition Records Found </h2></div>";
      }
      
      #weight
      $sql = "SELECT * FROM weight  WHERE u_id = '$uid'";
      $result = mysqli_query($conn, $sql);

      if ($result) {
          echo "<div class='welcome'><h2 class='mssg'> Weight Records </h2></div>
                  <div class='table_box'>
                      <table class='content-table'>
                          <thead>
                              <tr>
                                  <th>User ID</th>
                                  <th>Date</th>
                                  <th>Weight</th>
                                  <!-- Add other columns as needed -->
                              </tr>
                          </thead>
                          <tbody>";

          while ($row = mysqli_fetch_assoc($result)) {
              $userId = $row["u_id"];
              $date = $row["date"];
              $weight = $row["weight"];

              echo "
                      <tr>
                          <td>$userId</td>
                          <td>$date</td>
                          <td>$weight</td>
                          <!-- Add other columns as needed -->
                      </tr>";
          }

          echo "</tbody></table></div>";
      } else {
          echo "<div class='welcome'><h2 class='mssg'> No Weight Records Found </h2></div>";
      }
     
      #workout


      $sql = "SELECT * FROM workout  WHERE u_id = '$uid'";
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
      




    ?>
    <form id="weekForm" action="urecords.php" method="post">
    <input type="hidden" id="weekInput" name="week" value="">
    <button type="submit">Submit</button>
</form>

<script>
// Function to retrieve the current day's week name and set it into the hidden input field
function insertWeekNameIntoForm() {
    // Define an array of week names
    var weekNames = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    
    // Create a new Date object
    var today = new Date();
    
    // Get the day index (0 for Sunday, 1 for Monday, ..., 6 for Saturday)
    var dayIndex = today.getDay();
    
    // Retrieve today's week name using the day index
    var weekName = weekNames[dayIndex];
    
    // Set the week name into the hidden input field of the form
    document.getElementById('weekInput').value = weekName;
}

// Call the function to insert the week name into the form before submission
window.onload = function() {
    insertWeekNameIntoForm();
};
</script>

    <?php
require "connection.php";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the week name from the form submission
    $weekName = $_POST['week'];
    
    // Retrieve the user ID from the session
    $uid = $_SESSION["userID"];
    
    // Fetch activities for the specified user and week
    $sql = "SELECT a.* FROM activity a INNER JOIN time t ON a.set_num = t.set_num WHERE t.u_id = '$uid'  AND t.week = '$weekName';";
    
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<div class='welcome'><h2 class='mssg'> Activities For $weekName </h2></div>
            <div class='table_box'>
                <table class='content-table'>
                    <thead>
                        <tr>
                            <th>Activity ID</th>
                            <th>Activity Name</th>
                            <th>Description</th>
                            <th>Target</th>
                            <th>Minimum Sets</th>
                            <!-- Add other columns as needed -->
                        </tr>
                    </thead>
                    <tbody>";

        while ($row = mysqli_fetch_assoc($result)) {
            $activityId = $row["activity_id"];
            $set = $row["sets"];
            $at = $row["activity_type"];
            $activityName = $row["activity_name"];
            $description = $row["description"];
            

            echo "
                <tr>
                    <td>$activityId</td>
                    <td>$activityName</td>
                    <td>$description</td>
                    <td>$at</td>
                    <td>$set</td>
                    <!-- Add other columns as needed -->
                </tr>";
        }

        echo "</tbody></table></div>";
    } else {
        echo "<div class='welcome'><h2 class='mssg'> No Activity Records Found </h2></div>";
    }
} else {
    // If the form has not been submitted, display a message
    echo "<div class='welcome'><h2 class='mssg'> Please submit the form to view activities </h2></div>";
}
?>





  </body>
</html>
