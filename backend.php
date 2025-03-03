<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    
    if ($email) {
        $to = "johnbishopflynn@gmail.com";
        $subject = "New Contact Request";
        $message = "You received a new message from: " . $email;
        $headers = "From: no-reply@yourdomain.com";

        mail($to, $subject, $message, $headers);

        // Auto-reply
        $autoReplySubject = "Thank You for Reaching Out!";
        $autoReplyMessage = "We’ve received your message and will get back to you shortly.";
        mail($email, $autoReplySubject, $autoReplyMessage, $headers);

        echo "Message sent successfully!";
    } else {
        echo "Invalid email address.";
    }
}
?>
