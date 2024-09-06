<?php
 session_start();
 if(!$_SESSION["userID"])
 {
   header("Location:admin.login.php");
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



   <div class="top_img"><img src="Resource/logo3.jpg"></div>
   <div class="navigation-bar" style="text-align: center">
   <a href="arecords.php" >Records</a>
   <a href="asearch.php" >Activity</a>
    <a href="aregister.php">Register</a>
    <a href="adelete.php">Delete</a>
    <a class='logout' href="logout.php">Logout</a>
  </div>
  <style>
	.navigation-bar a{
		font-size: 22px;
	}
  </style>
  <script>
  jQuery(function($) {
      $("#date").datepicker();
  });
    jQuery(function($) {
      $("#date1").datepicker();
  });
  </script>
  <?php
   
    require "connection.php";

    $uid = $_SESSION["userID"];
     #user
    $sql = "SELECT * FROM user";
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

?>
  <div class='welcome'><h2 class='welcome_mssg'> Enter User ID</h2></div>
  <div class="form_form_box">
    <div class="form">
    <form class="search-form" action="arecords.php" method="post">
      <label for="did"><span class="content-name">User ID</span></label>
      <input type="text" name="did" placeholder="Enter user ID"><br>
      <label for="date"><span class="content-name">From Date</span></label>
      <input type="text" id="date" name="date" placeholder="Enter a valid date"><br>
      <label for="date1"><span class="content-name">To Date</span></label>
      <input type="text" id="date1" name="date1" placeholder="Enter a valid date"><br>
      <input type="submit" name="search-submit" value="Search">
    </form>
  </div>
  </div>


    <?php
    if(isset($_POST["search-submit"])){
        $U_id=$_POST["did"];
    require "connection.php";

    $uid = $_SESSION["userID"];
    $newdate = date_create($_POST["date"]);
    $date = date_format($newdate, "Y-m-d");
    $new = date_create($_POST["date1"]);
    $d1 = date_format($new, "Y-m-d");

    
    #user
     $sql = "SELECT * FROM user  WHERE u_id = '$U_id'";
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
         echo "<div class='welcome'><h2 class='mssg'> No User Found </h2></div>";
     }
     #attends
     
     $sql = "SELECT * FROM attends WHERE u_id = '$U_id' AND date between '$date' AND '$d1'";
     $result = mysqli_query($conn, $sql);
 
     if ($result) {
         echo "<div class='welcome'><h2 class='mssg'> User Attends Records </h2></div>
             <div class='table_box'>
                 <table class='content-table'>
                     <thead>
                         <tr>
                             <th>User ID</th>
                             <th>Date</th>
                             <th>Check In</th>
                             <th>Check Out</th>
                             
                         </tr>
                     </thead>
                     <tbody>";
 
         while ($row = mysqli_fetch_assoc($result)) {
             $userId = $row["u_id"];
             $date = $row["date"];
             $checki = $row["checkin"];
             $checko= $row["checkout"];
             
             echo "
                 <tr>
                     <td>$userId</td>
                     <td>$date</td>
                     <td>$checki</td>
                     <td>$checko</td>
                    
                 </tr>";
         }
 
         echo "</tbody></table></div>";
     } else {
         echo "<div class='welcome'><h2 class='mssg'> No Activity Records Found </h2></div>";
     }
     #payment
     $sql = "SELECT * FROM payment WHERE u_id = '$U_id' AND date between '$date' AND '$d1' "  ;
     $result = mysqli_query($conn, $sql);
 
     if ($result) {
         echo "<div class='welcome'><h2 class='mssg'> User Payment Records </h2></div>
             <div class='table_box'>
                 <table class='content-table'>
                     <thead>
                         <tr>
                             <th>User ID</th>
                             <th>Date</th>
                             <th>payment id</th>
                             <th>Payment Method</th>
                             <th>Amount</th>
                             
                         </tr>
                     </thead>
                     <tbody>";
 
         while ($row = mysqli_fetch_assoc($result)) {
             $userId = $row["u_id"];
             $date = $row["date"];
             $id = $row["payment_id"];
             $met= $row["payment_method"];
            $cash=$row["amount"];
             
             echo "
                 <tr>
                     <td>$userId</td>
                     <td>$date</td>
                     <td>$id</td>
                     <td>$met</td>
                     <td>$cash</td>
                    
                 </tr>";
         }
 
         echo "</tbody></table></div>";
     } else {
         echo "<div class='welcome'><h2 class='mssg'> No Activity Records Found </h2></div>";
     }
     

    }
 
 
    
    
    ?>
</body>

</html>