<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $city = htmlspecialchars($_POST['city']);

    // Recipient email address
    $to = "your-email@example.com"; // Replace with your email address
    $subject = "New Appointment Booking Request";

    // Email body content in HTML format
    $message = "
    <html>
    <head>
        <title>New Appointment Booking Request</title>
    </head>
    <body>
        <h2>Appointment Booking Details</h2>
        <p><strong>Name:</strong> " . $name . "</p>
        <p><strong>Phone:</strong> " . $phone . "</p>
        <p><strong>Email:</strong> " . $email . "</p>
        <p><strong>City:</strong> " . $city . "</p>
    </body>
    </html>";

    // Email headers to ensure the email is sent as HTML
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: no-reply@yourwebsite.com" . "\r\n"; // Change to a valid sender email address
    $headers .= "Reply-To: " . $email . "\r\n";

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        echo "Thank you for booking! We will get back to you shortly.";
    } else {
        echo "Sorry, there was an error processing your request. Please try again later.";
    }
}
?>
