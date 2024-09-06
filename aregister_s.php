<?php
require 'connection.php';

session_start();
if (!isset($_SESSION["userID"])) {
    header("Location: admin.login.php");
}

if (isset($_POST["input-submit"])) {
    $sn = $_POST["set"];
    $sssn = $_POST["sssn"];
    $sts = $_POST["sets"];
    $fn = $_POST["fname"];
    $ln = $_POST["lname"];

    // Insert into activity table
    $sql = "INSERT INTO activity (activity_type,activity_name, description,set_num,sets)
            VALUES ('$sssn','$fn', '$ln','$sn','$sts')";

    $is_inserted = mysqli_query($conn, $sql);

    if ($is_inserted) {
        header("Location: aregister.php?login=success");
        exit();
    } else {
        header("Location: aregister.php?error=wronghid");
        exit();
    }
} else {
    header("Location: aregister.php");
    exit();
}
?>
