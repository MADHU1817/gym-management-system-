<?php
  require 'connection.php';

  session_start();
  if(!isset($_SESSION["userID"]))
  {
    header("Location:trainer.login.php");
  }

  if (isset($_POST["input-submit"])) {
  

    $uid=$_POST["userid"];
    

    $week_days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
    
    // Define the set numbers for each day
    $set_numbers = array(
        'Monday' => isset($_POST['set_monday']) ? $_POST['set_monday'] : null,
        'Tuesday' => isset($_POST['set_tuesday']) ? $_POST['set_tuesday'] : null,
        'Wednesday' => isset($_POST['set_wednesday']) ? $_POST['set_wednesday'] : null,
        'Thursday' => isset($_POST['set_thursday']) ? $_POST['set_thursday'] : null,
        'Friday' => isset($_POST['set_friday']) ? $_POST['set_friday'] : null,
        'Saturday' => isset($_POST['set_saturday']) ? $_POST['set_saturday'] : null,
        'Sunday' => isset($_POST['set_sunday']) ? $_POST['set_sunday'] : null
    );

    foreach ($week_days as $day) {
      // Get the set number for the current day
      $set_num = $set_numbers[$day];
      
      // Check if the set number is provided for the current day
      
          // Prepare the INSERT query
          $sql = "UPDATE time SET set_num='$set_num' WHERE u_id='$uid' AND week='$day'"; 
          $is_inserted=mysqli_query($conn,$sql);
          // Execute the query
        }

    $is_inserted=mysqli_query($conn,$sql);
    if($is_inserted){
      header("Location:tinsert.php?login=success");
      exit();}
    else
    {
      header("Location:tinsert.php?error=wronguser");
      exit();
    }
  }
  else {
    header("Location:uinsert.php");
    exit();
  }

 ?>
