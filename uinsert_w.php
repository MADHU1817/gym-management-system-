<?php
  require 'connection.php';

  session_start();
  if(!isset($_SESSION["userID"]))
  {
    header("Location:doctor.login.php");
  }

  if (isset($_POST["input-submit"])) {

   $uid=$_SESSION['userID'];
   $newdate=date_Create($_POST["date"]);
   $date=date_format($newdate,"Y-m-d");
   $wei=$_POST["weight"];

    $sql="INSERT INTO weight (u_id, date,
       weight)
       VALUES ( '$uid', '$date',
         '$wei')";
    $is_inserted=mysqli_query($conn,$sql);
    if($is_inserted){
      header("Location:uinsert.php?login=success");
      exit();}
    else
    {
      header("Location:uinsert.php?error=wronguser");
      exit();
    }
  }
  else {
    header("Location:uinsert.php");
    exit();
  }

 ?>
