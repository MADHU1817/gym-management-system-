<?php
 session_start();
 if(!$_SESSION["userID"])
 {
   header("Location:trainer.login.php");
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
  <style>
	
  .input-form-box .input-form select[id='set'] {
  width: 60%;
  padding: 8px;
  border: 1px solid #ccc; 
  border-radius: 5px;
  font-size: 16px;
  margin-bottom: 10px;
}
.input-form-box .input-form select[id='set'] {
  width: 60%; 
  padding: 8px; 
  border: 1px solid #ccc; 
  border-radius: 5px;
  font-size: 16px; 
  margin-bottom: 10px; 
}
.input-form-box .input-form select[id='set'] option {
  font-size: 16px; 
}



.input-form-box .input-form select[id='set'] option {
  font-size: 16px; 
}
  </style>
</head>
<body>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/jquery-ui-timepicker-addon.min.js"></script>

  <div class="top_img"><img src="Resource/logo12.jpg"></div>
<div class="navigation-bar" style="text-align: center">
    <a href="tdashboard.php">Home</a>
    <a href="trecords.php">Records</a>
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
        <form class='choice_form' action='tinsert.php' method='post'>
          <label for='ch'>Assign Daily Activity</label>
          <input type='checkbox' name='ch' value='1'><br>
          <label for='ch'>Update Activity Time table</label>
          <input type='checkbox' name='ch' value='2'><br>
          <input type='submit' name='choice-submit' value='NEXT'>
        </form>
      </div>";
    }

    else {
      if ($_POST["ch"]=="1") {
        echo "<div class='welcome'><h2 class='welcome_mssg'> Daily Activity Form</h2></div>
  <div class='input-form-box'>
    <form class='input-form' action='tinsert_n.php' method='post'>

    <label for='UID'>User ID</label>
      <textarea name='userid' placeholder='Enter the User ID'></textarea><br>

      <label for='set'>Monday:</label>
      <select name='set_monday' id='set'>
          <option value='' disabled selected>Select Specific</option>
          <option value='1'>Upper Body</option>
          <option value='2'>Core</option>
          <option value='3'>Lower Body</option>
          <option value='4'>Cardiovascular</option>
          <option value='5'>Flexibility and Mobility</option>
          <option value='6'>Functional Training</option>
      </select><br>

      <label for='set'>Tuesday:</label>
      <select name='set_tuesday' id='set'>
          <option value='' disabled selected>Select Specific</option>
          <option value='1'>Upper Body</option>
          <option value='2'>Core</option>
          <option value='3'>Lower Body</option>
          <option value='4'>Cardiovascular</option>
          <option value='5'>Flexibility and Mobility</option>
          <option value='6'>Functional Training</option>
      </select><br>

      <!-- Repeat the above code for the remaining days of the week -->

      <!-- For Wednesday -->
      <label for='set'>Wednesday:</label>
      <select name='set_wednesday' id='set'>
          <option value='' disabled selected>Select Specific</option>
          <option value='1'>Upper Body</option>
          <option value='2'>Core</option>
          <option value='3'>Lower Body</option>
          <option value='4'>Cardiovascular</option>
          <option value='5'>Flexibility and Mobility</option>
          <option value='6'>Functional Training</option>
      </select><br>

      <!-- For Thursday -->
      <label for='set'>Thursday:</label>
      <select name='set_thursday' id='set'>
          <option value='' disabled selected>Select Specific</option>
          <option value='1'>Upper Body</option>
          <option value='2'>Core</option>
          <option value='3'>Lower Body</option>
          <option value='4'>Cardiovascular</option>
          <option value='5'>Flexibility and Mobility</option>
          <option value='6'>Functional Training</option>
      </select><br>

      <!-- For Friday -->
      <label for='set'>Friday:</label>
      <select name='set_friday' id='set'>
          <option value='' disabled selected>Select Specific</option>
          <option value='1'>Upper Body</option>
          <option value='2'>Core</option>
          <option value='3'>Lower Body</option>
          <option value='4'>Cardiovascular</option>
          <option value='5'>Flexibility and Mobility</option>
          <option value='6'>Functional Training</option>
      </select><br>

      <!-- For Saturday -->
      <label for='set'>Saturday:</label>
      <select name='set_saturday' id='set'>
          <option value='' disabled selected>Select Specific</option>
          <option value='1'>Upper Body</option>
          <option value='2'>Core</option>
          <option value='3'>Lower Body</option>
          <option value='4'>Cardiovascular</option>
          <option value='5'>Flexibility and Mobility</option>
          <option value='6'>Functional Training</option>
      </select><br>

      <!-- For Sunday -->
      <label for='set'>Sunday:</label>
      <select name='set_sunday' id='set'>
          <option value='' disabled selected>Select Specific</option>
          <option value='1'>Upper Body</option>
          <option value='2'>Core</option>
          <option value='3'>Lower Body</option>
          <option value='4'>Cardiovascular</option>
          <option value='5'>Flexibility and Mobility</option>
          <option value='6'>Functional Training</option>
      </select><br>
      <input type='submit' name='input-submit' value='Save'>
    </form>

  </div>";
      }
      elseif ($_POST["ch"]=="2") {
        echo "<div class='welcome'><h2 class='welcome_mssg'> Daily Activity Form</h2></div>
        <div class='input-form-box'>
          <form class='input-form' action='tinsert_u.php' method='post'>
      
          <label for='UID'>User ID</label>
            <textarea name='userid' placeholder='Enter the User ID'></textarea><br>
      
            <label for='set'>Monday:</label>
            <select name='set_monday' id='set'>
                <option value='' disabled selected>Select Specific</option>
                <option value='1'>Upper Body</option>
                <option value='2'>Core</option>
                <option value='3'>Lower Body</option>
                <option value='4'>Cardiovascular</option>
                <option value='5'>Flexibility and Mobility</option>
                <option value='6'>Functional Training</option>
            </select><br>
      
            <label for='set'>Tuesday:</label>
            <select name='set_tuesday' id='set'>
                <option value='' disabled selected>Select Specific</option>
                <option value='1'>Upper Body</option>
                <option value='2'>Core</option>
                <option value='3'>Lower Body</option>
                <option value='4'>Cardiovascular</option>
                <option value='5'>Flexibility and Mobility</option>
                <option value='6'>Functional Training</option>
            </select><br>
      
            <!-- Repeat the above code for the remaining days of the week -->
      
            <!-- For Wednesday -->
            <label for='set'>Wednesday:</label>
            <select name='set_wednesday' id='set'>
                <option value='' disabled selected>Select Specific</option>
                <option value='1'>Upper Body</option>
                <option value='2'>Core</option>
                <option value='3'>Lower Body</option>
                <option value='4'>Cardiovascular</option>
                <option value='5'>Flexibility and Mobility</option>
                <option value='6'>Functional Training</option>
            </select><br>
      
            <!-- For Thursday -->
            <label for='set'>Thursday:</label>
            <select name='set_thursday' id='set'>
                <option value='' disabled selected>Select Specific</option>
                <option value='1'>Upper Body</option>
                <option value='2'>Core</option>
                <option value='3'>Lower Body</option>
                <option value='4'>Cardiovascular</option>
                <option value='5'>Flexibility and Mobility</option>
                <option value='6'>Functional Training</option>
            </select><br>
      
            <!-- For Friday -->
            <label for='set'>Friday:</label>
            <select name='set_friday' id='set'>
                <option value='' disabled selected>Select Specific</option>
                <option value='1'>Upper Body</option>
                <option value='2'>Core</option>
                <option value='3'>Lower Body</option>
                <option value='4'>Cardiovascular</option>
                <option value='5'>Flexibility and Mobility</option>
                <option value='6'>Functional Training</option>
            </select><br>
      
            <!-- For Saturday -->
            <label for='set'>Saturday:</label>
            <select name='set_saturday' id='set'>
                <option value='' disabled selected>Select Specific</option>
                <option value='1'>Upper Body</option>
                <option value='2'>Core</option>
                <option value='3'>Lower Body</option>
                <option value='4'>Cardiovascular</option>
                <option value='5'>Flexibility and Mobility</option>
                <option value='6'>Functional Training</option>
            </select><br>
      
            <!-- For Sunday -->
            <label for='set'>Sunday:</label>
            <select name='set_sunday' id='set'>
                <option value='' disabled selected>Select Specific</option>
                <option value='1'>Upper Body</option>
                <option value='2'>Core</option>
                <option value='3'>Lower Body</option>
                <option value='4'>Cardiovascular</option>
                <option value='5'>Flexibility and Mobility</option>
                <option value='6'>Functional Training</option>
            </select><br>     
             <input type='submit' name='input-submit' value='Save'>
    </form>

  </div>";
      }
    }
 ?>



</body>
</html>
