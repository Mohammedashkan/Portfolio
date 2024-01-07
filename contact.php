<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'vendor/autoload.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Compose email message
    $to = "ashkan.mohammed98@gmail.com";
    $email_subject = "New Contact Form Submission: $subject";
    $email_body = "You have received a new contact form submission:\n\n";
    $email_body .= "Name: $firstName $lastName\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Subject: $subject\n";
    $email_body .= "Message:\n$message";

    // Set additional headers
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Send email
    mail($to, $email_subject, $email_body, $headers);

    // Optionally, redirect the user to a thank you page
    header("Location: thank-you.html");
    exit();
}
?>
