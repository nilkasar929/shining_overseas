<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Basic validation
    if (empty($name) || empty($email) || empty($message)) {
        http_response_code(400);
        echo "Please fill in all required fields";
        exit;
    }

    // Email configuration
    $to = 'nileshkasar929@gmail.com'; // Change this to your email address
    $subject = 'New Contact Form Submission';
    $headers = "From: $name <$email>";
    $body = "Name: $name\nEmail: $email\nPhone Number: $phone\nMessage: $message";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        http_response_code(200);
        echo "Form submitted successfully";
    } else {
        http_response_code(500);
        echo "There was a problem submitting the form";
    }
} else {
    http_response_code(405);
    echo "Method Not Allowed";
}
?>
