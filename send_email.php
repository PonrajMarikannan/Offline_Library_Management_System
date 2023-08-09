<?php
use PHPMailer\PHPMailer\PHPMailer;
require './vendor/phpmailer/phpmailer/src/Exception.php';
require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './vendor/phpmailer/phpmailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the form data
  $username = $_POST['username'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $query = $_POST['query'];

  $to = 'jpkavishka@gmail.com';
  $subject = 'New Contact Form Submission';
  $message = "Name: $username\n";
  $message .= "Phone: $phone\n";
  $message .= "Email: $email\n";
  $message .= "Query: $query\n";

  // Create a new PHPMailer instance
  require './vendor/autoload.php';
  $mail = new PHPMailer(true);

  // Configure SMTP settings (assuming you want to send via SMTP)
  $mail->isSMTP();
  $mail->SMTPDebug = 2;
  $mail->Host = 'smtp.example.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'jpkavishka@gmail.com';
  $mail->Password = 'uhlfsxpucoarxkex';
  $mail->Port = 587; // Adjust the port if necessary

  // Set the email content
  $mail->setFrom($email);
  $mail->addAddress($to);
  $mail->Subject = $subject;
  $mail->Body = $message;

  // Send the email
  if ($mail->send()) {
    echo '<script>alert("Thank you for contacting us. We will get back to you soon.");</script>';
  } else {
    echo '<script>alert("Oops! Something went wrong. Please try again later.");</script>';
  }
}
?>
