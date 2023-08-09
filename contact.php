<?php
include 'link.php';
include 'database_connection.php';
include 'function.php';


if(is_user_login())
{
	header('location:issue_book_details.php');
}

include 'header1.php';


?>


<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './vendor/phpmailer/phpmailer/src/Exception.php';
require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './vendor/phpmailer/phpmailer/src/SMTP.php';


?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Form</title>
</head>
<body>

<?php
$alertMessage = '';
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if(!empty($name)){

    $mail = new PHPMailer(true);

			$mail->isSMTP();

			$mail->Host = 'smtp.gmail.com';  

			$mail->SMTPAuth = true;

			$mail->Username = 'jpkavishka@gmail.com';  

			$mail->Password = 'uhlfsxpucoarxkex';  

			$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

			$mail->Port = 587;

			$mail->setFrom('jpkavishka@gmail.com', 'FromLibrarian');

            $mail->addAddress('jpkavishka@gmail.com', $name);

            $mail->isHTML(true);

			$mail->Subject = 'Query from users of Library Management System';

            $mail->Body = 
			 ''.$email. ' ' .$message.''
			;

            if ($mail->send()) {
                $alertMessage = '<div class="alert alert-success">Email sent successfully. Thank you for contacting us!</div>';
            } else {
                $alertMessage = '<div class="alert alert-danger">Failed to send the email. Please try again later.</div>';
            }
   }
 }
?>

<style>
    body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-image: url('https://img.freepik.com/premium-photo/product-presentation-wooden-table-with-background-empty-bookshelf-library_172251-444.jpg');
            background-repeat: no-repeat;
            background-size: auto 140%; 
	       backdrop-filter: blur(1px); 
  
        }

        .attractive-transparent-form {
    background-color: rgba(0, 0, 0, 0.75);
    color: white;
    padding: 20px;
    border-radius: 10px;
}

.attractive-transparent-form label {
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
}

.attractive-transparent-form input[type="text"],
.attractive-transparent-form input[type="email"],
.attractive-transparent-form textarea {
    background-color: rgba(255, 255, 255, 0.5);
    color: black;
    border: none;
    padding: 10px;
    margin-bottom: 10px;
    width: 100%;
}

.attractive-transparent-form input[type="submit"] {
    background-color: black;
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
}

.attractive-transparent-form input[type="submit"]:hover {
    background-color: white;
    color: black;
}


        h2 {
            text-align: center;
        }

        .form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-container label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .form-container input[type="text"],
        .form-container input[type="email"],
        .form-container textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .form-container input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }
        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        } 
</style>

<h2 style="font-size: 24px; color: white; font-weight: bold;">CONTACT FORM</h2>
<div class="form-container">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="attractive-transparent-form">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Message:</label>
        <textarea id="message" name="message" required></textarea>
        <?php echo $alertMessage; // Display the alert message if set ?>
        <input type="submit" name="submit" value="Submit">
    </form>
</div>

</body>
</html>
