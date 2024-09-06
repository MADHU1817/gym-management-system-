<html>
<head>
  <link rel="apple-touch-icon" sizes="180x180" href="Resource/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="Resource/logo.png">
  <link rel="icon" type="image/png" sizes="16x16" href="Resource/logo.png">
  <link rel="manifest" href="Resource/favicon/site.webmanifest">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" type="text/css" href="css/about_style.css">
	<title> About </title>

</head>

<body style="background: black;">
<div class="navigation-bar">
 <img src="Resource/logo2.jpg" alt="logo">
  <?php
    session_start();
    if(isset($_SESSION["userID"]) && $_SESSION["uc"]=="1")
    {
      echo "<a href='logout.php'>Logout</a>
      <a href='udashboard.php'>Profile </a>
      <a href='index.php'> Home</a>";
    }
    elseif (isset($_SESSION["userID"]) && $_SESSION["uc"]=="2") {
      echo "<a href='logout.php'>Logout</a>
      <a href='uregister.php'>Profile </a>
      <a href='index.php'> Home</a>";
    }
    elseif (isset($_SESSION["userID"]) && $_SESSION["uc"]=="3") {
      echo "<a href='logout.php'>Logout</a>
      <a href='sdashboard.php'>Profile </a>
      <a href='index.php'> Home</a>";
    }
    else {
      echo " <div class='dropdown'>
    <button class='dropbtn'> Login <i class='fa fa-caret-down'></i>
    </button>
    <div class='dropdown-content'>
      <a href='user.login.php'>user Login</a>
      <a href='admin.login.php'>Admin Login</a>
    </div>

  </div>
  <a href='about.php'>About </a>
  <a href='index.php'> Home</a>";
    }
   ?>
</div>

<div class="wrapper">
  <div class="container">
    <p>An integrated gym and fitness management system on a website optimizes operations for both administrators and members.<br>
     It offers user-friendly registration and profile management, diverse membership plans, and efficient class scheduling with member sign-ups and automated reminders.<br>
      The system ensures accurate attendance tracking and secure billing processes, complete with progress tracking tools for member engagement.<br>
       Communication is streamlined through messaging and notifications.<br>
        Robust employee management, detailed analytics, mobile accessibility, and adherence to security measures contribute to overall effectiveness.<br>
         Additional features include equipment reservation, marketing capabilities, and member feedback mechanisms, creating a comprehensive platform for gym management and members alike.</p>
  </div>
</div>



</body>
</html>
