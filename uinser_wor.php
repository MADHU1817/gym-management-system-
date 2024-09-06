<?php
require 'connection.php';

session_start();
if (!isset($_SESSION["userID"])) {
    header("Location: doctor.login.php");
}

if (isset($_POST["input-submit"])) {

    $uid = $_SESSION['userID'];
    $newdate = date_create($_POST["date"]);
    $date = date_format($newdate, "Y-m-d");
    $duration = $_POST["duration"];
    $activity_id = $_POST["activity"];

    $sql = "INSERT INTO workout (u_id, durations, date, activity_id)
            VALUES ('$uid', '$duration', '$date', '$activity_id')";
    $is_inserted = mysqli_query($conn, $sql);
    if ($is_inserted) {
        header("Location: uinsert.php?login=success");
        exit();
    } else {
        header("Location: uinsert.php?error=wronguser");
        exit();
    }
} else {
    header("Location: uinsert.php");
    exit();
}
?>
