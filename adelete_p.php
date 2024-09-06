<?php
  require 'connection.php';

  session_start();
  if(!isset($_SESSION["userID"]))
  {
    header("Location:admin.login.php");
  }

  if(isset($_POST["input-submit"]))
  {
    $pssn=$_POST["pssn"];
    $sql="DELETE FROM attends WHERE U_id = '$pssn'";
    $sql="DELETE FROM payment WHERE U_id = '$pssn'";
    $sql="DELETE FROM workout WHERE U_id = '$pssn'";
    $sql="DELETE FROM weight WHERE U_id = '$pssn'";
    $sql="DELETE FROM nutrition WHERE U_id = '$pssn'";
    $sql="DELETE FROM user WHERE U_id = '$pssn'";

    $is_deleted=mysqli_query($conn,$sql);

    if($is_deleted)
    {
      header("Location:adelete.php?login=success");
    }
    else {
      header("Location:adelete.php?error=wronguser");
    }
  }
  else {
    header("Location:adelete.php");
  }




 ?>
