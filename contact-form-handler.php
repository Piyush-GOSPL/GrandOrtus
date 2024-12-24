<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data and sanitize it
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $services = htmlspecialchars($_POST['services']);
    $message = htmlspecialchars($_POST['message']);

    // Email settings
    $to = "maheshverma.niit@gmail.com"; // Replace with your email
    $subject = "New Contact Form Submission";
    $body = "
        <h3>Contact Form Details:</h3>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Phone:</strong> $phone</p>
        <p><strong>Service Requested:</strong> $services</p>
        <p><strong>Message:</strong><br>$message</p>
    ";
    $headers = "From: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Message sent successfully!'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Failed to send the message. Please try again.'); window.location.href='index.html';</script>";
    }
}
?>
