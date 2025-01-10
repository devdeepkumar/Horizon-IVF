<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and sanitize form inputs
    $service = htmlspecialchars($_POST['fertility-service']);
    $name = htmlspecialchars($_POST['contact-name']);
    $email = filter_var($_POST['contact-email'], FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars($_POST['contact-phone']);
    $date = htmlspecialchars($_POST['contact-date']);
    $time = htmlspecialchars($_POST['contact-time']);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Prepare email details
    $to = "contact@ifvfertility.com";  // Replace with your email address
    $subject = "New Appointment Booking Request";
    $message = "
    <html>
    <head>
        <title>New Appointment Booking Request</title>
    </head>
    <body>
        <h2>New Appointment Booking Request</h2>
        <p><strong>Service:</strong> $service</p>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Phone:</strong> $phone</p>
        <p><strong>Appointment Date:</strong> $date</p>
        <p><strong>Appointment Time:</strong> $time</p>
    </body>
    </html>
    ";

    // Email headers
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: no-reply@horizonfertility.com" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "Thank you! Your appointment request has been sent successfully.";
    } else {
        echo "Sorry, there was an error processing your request. Please try again.";
    }
}
?>
