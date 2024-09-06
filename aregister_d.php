<?php
require 'connection.php';

session_start();
if (!isset($_SESSION["userID"])) {
    header("Location: admin.login.php");
}

if (isset($_POST["input-submit"])) {
    $dssn = $_POST["dssn"];
    $newdate = date_create($_POST["date"]);
    $date = date_format($newdate, "Y-m-d");

   // $date = $_POST["date"];
    $itime = $_POST["itime"];
    $otime = $_POST["otime"];


    $sql = "INSERT INTO attends (u_id, date, checkin, checkout)
            VALUES ('$dssn', '$date', '$itime', '$otime')";

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
