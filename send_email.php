<?php
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader (make sure to adjust this path to your autoload.php)
require 'vendor/autoload.php'; // Ensure this path points to your vendor directory

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();                                           // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                          // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                                   // Enable SMTP authentication
        $mail->Username = 'nirajdhungana0fficial@gmail.com';    // SMTP username
        $mail->Password = 'sqqv otxp kxjx jknc';                 // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;     // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                       // TCP port to connect to (use 587 for TLS)

        // Enable SMTP debugging
        $mail->SMTPDebug = 2; // 0 = off (for production use), 1 = client messages, 2 = client and server messages

        // Recipients
        $mail->setFrom('nirajdhungana0fficial@gmail.com', 'Niraj Dhungana'); // Sender's email and name
        $mail->addAddress('nirajdhungana0fficial@gmail.com');                // Add a recipient (can be same as sender for testing)

        // Content
        $mail->isHTML(true);                                              // Set email format to HTML
        $mail->Subject = "New Contact Form Submission from $name";
        $mail->Body    = "Name: $name<br>Email: $email<br><br>Message:<br>$message";
        $mail->AltBody = "Name: $name\nEmail: $email\n\nMessage:\n$message";

        // Send the email
        $mail->send();
        echo 'Email sent successfully.';
    } catch (Exception $e) {
        echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Invalid request.";
}
?>
