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


  <div class="top_img"><img src="Resource/logo12.jpg"></div>
<div class="navigation-bar" style="text-align: center">
    <a href="tdashboard.php">Home</a>
    <a href="trecords.php">Records</a>
    <a href="tactivity.php">Activity</a>
    <a href="tinsert.php">Insert</a>
    <a class='logout' href="logout.php">Logout</a>
</div>
<script>
    // Create a new Date object
var today = new Date();

// Define an array of week names
var weekNames = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

// Get the day index (0 for Sunday, 1 for Monday, ..., 6 for Saturday)
var dayIndex = today.getDay();

// Retrieve today's week name using the day index
var todayWeekName = weekNames[dayIndex];

// Use today's week name
console.log("Today's week name is: " + todayWeekName);



</script>
  <?php
   
    require "connection.php";
    $sett="set_num";

    $uid = $_SESSION["userID"];
    
    
    # Activity
    $sql = "SELECT * FROM activity WHERE set_num=1" ;
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<div class='welcome'><h2 class='mssg'> Activitys For Upper-Body  </h2></div>
            <div class='table_box'>
                <table class='content-table'>
                    <thead>
                        <tr>
                            <th>Activity ID</th>
                            <th>Activity Name</th>
                            <th>Description</th>
                            <th> Target</th>
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
     # Activity
     $sql = "SELECT * FROM activity WHERE set_num=3" ;
     $result = mysqli_query($conn, $sql);
 
     if ($result) {
         echo "<div class='welcome'><h2 class='mssg'> Activitys For Lower Body  </h2></div>
             <div class='table_box'>
                 <table class='content-table'>
                     <thead>
                         <tr>
                             <th>Activity ID</th>
                             <th>Activity Name</th>
                             <th>Description</th>
                             <th> Target</th>
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
     # Activity
     $sql = "SELECT * FROM activity WHERE set_num=2" ;
     $result = mysqli_query($conn, $sql);
 
     if ($result) {
         echo "<div class='welcome'><h2 class='mssg'> Activitys For Core  </h2></div>
             <div class='table_box'>
                 <table class='content-table'>
                     <thead>
                         <tr>
                             <th>Activity ID</th>
                             <th>Activity Name</th>
                             <th>Description</th>
                             <th> Target</th>
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
     # Activity
     $sql = "SELECT * FROM activity WHERE set_num=4" ;
     $result = mysqli_query($conn, $sql);
 
     if ($result) {
         echo "<div class='welcome'><h2 class='mssg'> Activitys For Cardiovascular  </h2></div>
             <div class='table_box'>
                 <table class='content-table'>
                     <thead>
                         <tr>
                             <th>Activity ID</th>
                             <th>Activity Name</th>
                             <th>Description</th>
                             <th> Target</th>
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
     # Activity
     $sql = "SELECT * FROM activity WHERE set_num=5" ;
     $result = mysqli_query($conn, $sql);
 
     if ($result) {
         echo "<div class='welcome'><h2 class='mssg'> Activitys For Flexibility and Mobility </h2></div>
             <div class='table_box'>
                 <table class='content-table'>
                     <thead>
                         <tr>
                             <th>Activity ID</th>
                             <th>Activity Name</th>
                             <th>Description</th>
                             <th> Target</th>
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
     # Activity
     $sql = "SELECT * FROM activity WHERE set_num=6" ;
     $result = mysqli_query($conn, $sql);
 
     if ($result) {
         echo "<div class='welcome'><h2 class='mssg'> Activitys For Functional Training  </h2></div>
             <div class='table_box'>
                 <table class='content-table'>
                     <thead>
                         <tr>
                             <th>Activity ID</th>
                             <th>Activity Name</th>
                             <th>Description</th>
                             <th> Target</th>
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
     
 
    ?>
    </body>
    
    </html>
