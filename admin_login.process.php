<?php
if (isset($_POST["login-submit"])) {
    require "connection.php";

    $uid = $_POST["userID"];
    $pswd = $_POST["pass"];

    if (empty($uid) || empty($pswd)) {
        header("Location: admin.login.php?error=emptyfields");
        exit;
    } else {
        $sql = "SELECT * FROM admin WHERE admin_id=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: admin.login.php?error=sqlerror");
            exit;
        } else {
            mysqli_stmt_bind_param($stmt, "s", $uid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                if ($pswd !== $row["password"]) {
                    header("Location: admin.login.php?error=wrongpass");
                    exit();
                } else {
                    session_start();
                    $_SESSION["userID"] = $row["admin_id"];
                    $_SESSION["uc"] = "4";
                    header("Location: aregister.php");
                    exit();
                }
            } else {
                header("Location: admin.login.php?error=nouser");
                exit();
            }
        }
    }
} else {
    header("Location: index.php");
    exit();
}
?>
