<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "anjankumar31n@gmail.com";
    $subject = "the fitness management";
    $message = "This is a test email sent from your PHP web page.";

    // Additional headers
    $headers = "From: webmaster@example.com\r\n";
    $headers .= "Reply-To: webmaster@example.com\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully!";
    } else {
        echo "Email sending failed.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Email</title>
</head>
<body>

<form method="post" action="">
    <input type="submit" value="Send Email">
</form>

</body>
</html>
