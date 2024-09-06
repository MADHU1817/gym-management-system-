<?php
 session_start();
 if(!$_SESSION["userID"])
 {
   header("Location:admin.login.php");
 }
 ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="apple-touch-icon" sizes="180x180" href="Resource/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="Resource/logo.png">
  <link rel="icon" type="image/png" sizes="16x16" href="Resource/logo.png">
  <link rel="manifest" href="Resource/favicon/site.webmanifest">
  <link rel="stylesheet" type="text/css" href="css/aregister_style.css">
 <!-- <link rel="stylesheet" type="text/css" href="css/dinsert_style.css">-->


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/jquery-ui-timepicker-addon.min.css" />

  <title> Register </title>
  <style>
	.navigation-bar a{
		font-size: 22px;
	}
  .input-form-box .input-form select[name='sssn'] {
  width: 60%;
  padding: 8px;
  border: 1px solid #ccc; 
  border-radius: 5px;
  font-size: 16px;
  margin-bottom: 10px;
}
.input-form-box .input-form select[name='set'] {
  width: 60%; 
  padding: 8px; 
  border: 1px solid #ccc; 
  border-radius: 5px;
  font-size: 16px; 
  margin-bottom: 10px; 
}
.input-form-box .input-form select[name='set'] option {
  font-size: 16px; 
}



.input-form-box .input-form select[name='sssn'] option {
  font-size: 16px; 
}
  </style>
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
<script>
  jQuery(function($) {
      $("#time1").timepicker({
        timeFormat: "hh:mm tt"
      });
  });
</script>


  <script>
  jQuery(function($) {
      $("#dob").datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange:"1920:2020"
    });
  });
  </script>
</div>

<script>
  function showTargets() {
    var typeSpecific = document.getElementById("set").value;
    var targetDropdown = document.getElementById("sssn");
    targetDropdown.innerHTML = ""; // Clear previous options
    
    var targets = [];
    switch (typeSpecific) {
      case "1": // Upper Body
        targets = ["Chest", "Back", "Shoulders", "Arms"];
        break;
      case "2": // Core
        targets = ["Abs", "Obliques"];
        break;
      case "3": // Lower Body
        targets = ["Legs", "Glutes"];
        break;
      case "4": // Cardiovascular
        targets = ["Running", "Cycling", "Swimming"];
        break;
      case "5": // Flexibility and Mobility
        targets = ["Stretching", "Mobility Exercises"];
        break;
      case "6": // Functional Training
        targets = ["Functional Movement Patterns", "Balance and Stability"];
        break;
      default:
        targets = []; // No targets for other options
        break;
    }
    
    targets.forEach(function(target) {
      var option = document.createElement("option");
      option.value = target;
      option.text = target;
      targetDropdown.appendChild(option);
    });
  }
</script>
  <?php
  if (isset($_GET["error"]))
   {
    if($_GET["error"]=="wronguser")
    {
      echo "<div class='welcome' style='color: #D61A3C'><h2 class='welcome_mssg'> Wrong User ID </h2></div>";
    }
    elseif ($_GET["error"]=="wronghid") {
      echo "<div class='welcome' style='color: #D61A3C'><h2 class='welcome_mssg'> Wrong Activity id ID </h2></div>";
    }
  }
  elseif (isset($_GET["login"])) {
      if ($_GET["login"]=="success") {
        echo "<div class='welcome' style='color: #97DC21'><h2 class='welcome_mssg'> Registration Successful </h2></div>";
      }
    }
  elseif(!isset($_POST["choice-submit"])){
      echo "<div class='welcome'><h2 class='welcome_mssg'> Choose a Category</h2></div>
      
      <div class='choice_form_box'>
        <form class='choice_form' action='aregister.php' method='post'>
          <label for='ch'>User</label>
          <input type='checkbox' name='ch' value='1'><br>
          <label for='ch'>Attends</label>
          <input type='checkbox' name='ch' value='2'><br>
          <label for='ch'>Activity</label>
          <input type='checkbox' name='ch' value='3'><br>
          <label for='ch'>Payment</label>
          <input type='checkbox' name='ch' value='4'><br>
          <input type='submit' name='choice-submit' value='NEXT'>
        </form>
      </div>";
    }

    else {
      if ($_POST["ch"]=="1") {
        echo "<div class='welcome'><h2 class='welcome_mssg'> User Registration Form</h2></div>
  <div class='input-form-box'>
    <form class='input-form' action='aregister_p.php' method='post'>
      <label for='pssn'>User ID</label>
      <input type='text' name='pssn' placeholder='Enter a valid User ID' required><br>

      <label for='fname'> Name</label>
      <input type='text' name='fname' placeholder='Enter  Name' required><br>

      <label for='adr'>Address</label>
      <input type='text' name='adr' placeholder='Current Address' required ><br>
      
      <label for='cno'>Contact No.</label>
      <input type='text' name='cno' placeholder='Contact No.' required><br>

      <label for='mail'>Email</label>
      <input type='text' name='mail' placeholder='Email' required;><br>

      <label for='dob'>Date of Birth</label>
      <input type='text' name='dob' id='dob' placeholder='Date of birth' required><br>

      <label for='gen'>Gender</label>
      <input type='text' name='gen' placeholder='Gender' required><br>

      <label for='pass'>Password</label>
      <input type='text' name='pass' placeholder='Password' required><br>

      <input type='submit' name='input-submit' value='Save'>
    </form>

  </div>";
      }
      elseif ($_POST["ch"]=="2") {
          echo " <div class='welcome'><h2 class='welcome_mssg'> Attendences Form</h2></div>
    <div class='input-form-box'>
      <form class='input-form' action='aregister_d.php' method='post'>
        <label for='dssn'>User ID</label>
        <input type='text' name='dssn' placeholder='Enter a valid User ID' required><br>

        <label for='date'>Date</label>
        <input type='text' name='date' id='date' placeholder='Enter Date' required><br>
  
        <label for='time'>Check In Time</label>
        <input type='text' name='itime' id='time' placeholder='Enter Check In Time' required><br>

        <label for='time1'>Check out Time</label>
        <input type='text' name='otime' id='time1' placeholder='Enter Out Time' required><br>

       
        <input type='submit' name='input-submit' value='Save'>
      </form>

    </div>";
      }

      elseif ($_POST["ch"]=="3") {
        echo "  <div class='welcome'><h2 class='welcome_mssg'> Activity Form</h2></div>
        <div class='input-form-box'>
        <form class='input-form' action='aregister_s.php' method='post'>
        <label for='set'>Type Specific</label>
        <select name='set' id='set' required onchange='showTargets()'>
            <option value='' disabled selected>Select Specific</option>
            <option value='1'>Upper Body</option>
            <option value='2'>Core</option>
            <option value='3'>Lower Body</option>
            <option value='4'>Cardiovascular</option>
            <option value='5'>Flexibility and Mobility</option>
            <option value='6'>Functional Training</option>
        </select><br>
        
        <label for='sssn'>Target</label>
        <select name='sssn' id='sssn' required>
            <option value='' disabled selected>Select Target</option>
        </select><br>
        
        <label for='fname'>Activity Name</label>
        <input type='text' name='fname' placeholder='Enter Activity Name' required><br>
        
        <label for='lname'>Description</label>
        <input type='text' name='lname' placeholder='Enter Description' required><br>
        
        <label for='sets'>Minimum Sets</label>
        <input type='text' name='sets' placeholder='Enter set like 5repX7sets' required><br>
    
        <input type='submit' name='input-submit' value='Save'>
      </form>
    </div>";
      }

    elseif ($_POST["ch"]=="4") {
      echo "  <div class='welcome'><h2 class='welcome_mssg'> Payment Registration Form</h2></div>
<div class='input-form-box'>
  <form class='input-form' action='aregister_h.php' method='post'>
    <label for='hid'>Payment ID</label>
    <input type='text' name='p_id1' placeholder='Enter a Payment ID' required><br>

    <label for='name'>User ID</label>
    <input type='text' name='Uid' placeholder='Enter User ID' required><br>

    <label for='adr'>Amount</label>
    <input type='text' name='amo' placeholder='Enter Amount' required ><br>

    <label for='mail'>Payment Method</label>
    <input type='text' name='met' placeholder='Method' required><br>
    <label for='date'>Date of paid</label>
      <input type='text' name='date' id='date' placeholder='Date of poaid' required><br>

    <input type='submit' name='input-submit' value='Save'>
  </form>

</div>";
    }


    }
 ?>



</body>
</html>
