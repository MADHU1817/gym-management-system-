<?php
session_start();
if(!isset($_SESSION["userID"])) {
    header("Location: trainer.login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="apple-touch-icon" sizes="180x180" href="Resource/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="Resource/logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="Resource/logo.png">
    <link rel="manifest" href="Resource/favicon/site.webmanifest">
    <link rel="stylesheet" type="text/css" href="css/ddash_style.css">
    <title>Dashboard</title>
    
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

<?php
require "connection.php";
$uid = $_SESSION["userID"];
$sql = "SELECT t_id, name, gender, email, phone, experience FROM trainer WHERE t_id=?";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ddashboard.php?error=sqlerror");
    exit();
} else {
    mysqli_stmt_bind_param($stmt, "i", $uid);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
        $u_id = $row["t_id"];
        $name = $row["name"];
        $gender = $row["gender"];
        $dob = $row["experience"];
        $email = $row["email"];
        $phone = $row["phone"];
       

        echo "
        <div class='welcome'><h2 class='welcome_mssg'> GREETINGS $name </h2></div>

            <div class='pi_box'>
                <div class='pi_table'>
                    <h3>Personal Info</h3>
                    <table>
                        <tr><th>NAME</th><td>$name</td></tr>
                        <tr><th>GENDER</th><td>$gender</td></tr>
                        <tr><th>EXPERIENCE</th><td>$dob</td></tr>
                    </table>
                </div>
            </div>

            <div class='ci_box'>
                <div class='ci_table'>
                    <h3>Contact Info</h3>
                    <table>
                        <tr><th>EMAIL</th><td>$email</td></tr>
                        <tr><th>PHONE</th><td>$phone</td></tr>
                    </table>
                    <a href='user_info_edit.php'>Edit</a>
                </div>
            </div>
            <div class='footer'></div>
        ";
    } else {
        // No user found
        header("Location: ddashboard.php?error=nouser");
        exit();
    }
}
?>

</body>
</html>
