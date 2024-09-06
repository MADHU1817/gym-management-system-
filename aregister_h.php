<?php
require 'connection.php';

session_start();
if (!isset($_SESSION["userID"])) {
    header("Location: admin.login.php");
}

if (isset($_POST["input-submit"])) {
    $pid = $_POST["p_id1"];
    $Uid = $_POST["Uid"];
    $amo = $_POST["amo"];
    $met = $_POST["met"];
    $newdate = date_create($_POST["date"]);
    $date = date_format($newdate, "Y-m-d");

   // $date = $_POST["date"];

    $sql = "INSERT INTO payment (payment_id, u_id, amount, payment_method, date)
            VALUES ('$pid', '$Uid', '$amo', '$met', '$date')";

    $is_inserted = mysqli_query($conn, $sql);

    if ($is_inserted) {
        header("Location: aregister.php?login=success");
        exit();
    } else {
        header("Location: aregister.php?error=wronguser");
        exit();
    }
} else {
    header("Location: aregister.php");
    exit();
}
?>
