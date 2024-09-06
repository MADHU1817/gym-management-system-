<?php
 session_start();
 if (isset($_SESSION["userID"])) {
   header("Location:aregister.php");
 }
 ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="apple-touch-icon" sizes="180x180" href="Resource/logo1.png">
  <link rel="icon" type="image/png" sizes="32x32" href="Resource/logo.png">
  <link rel="icon" type="image/png" sizes="16x16" href="Resource/logo.png">
  <link rel="manifest" href="Resource/favicon/site.webmanifest">
  <link rel="stylesheet" type="text/css" href="css/login_style.css">
  <title> Login </title>
</head>

<body style="background-image: url(Resource/land.avif); background-size: cover;">


 <div class="login_box">
   <form class="login_form" action="user_pass.php" method="post">
     <h2>Sign In</h2>
     <?php
      if(isset($_GET["error"]))
      {
        if ($_GET["error"]=="emptyfields") {
          echo "<p class=login_error>Fill in all the fields</p>";
        }
        else if ($_GET["error"]=="wrongpass") {
          echo "<p class=login_error>Password does not match</p>";
        }
        else if ($_GET["error"]=="nouser") {
         echo "<p class=login_error>No User Found!</p>";
        }
      }
      else if (isset($_GET["login"])) {
         if ($_GET["login"]=="success") {
         echo "<p class=login_success>Login Succesful!</p>";
           }
      }
      ?>

     <label for="userID">User ID</label>
     <input type="text" name="userID" placeholder="Enter ID">
     <label for="emai">email</label>
     <input type="password" name="email" placeholder="Enter your Password">
     <label for="npass">New Password</label>
     <input type="password" name="npass" placeholder="Enter new Password">
     <label for="cpass">Confirm Password</label>
     <input type="password" name="cpass" placeholder="confirm Password">
     <input type="submit" name="login-submit" value="Update"><br>
     <a href="user.login.php">login</a>

   </form>


   </div>
 
 




</body>
</html>
