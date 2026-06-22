<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

function sendMail($customer_email, $customer_name)
{
    $mail = new PHPMailer(true);

    try
    {
        // SMTP Settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;

        // Your Gmail Address
        $mail->Username = 'sanikagaonkar0428@gmail.com';

        // NEW Gmail App Password (NO SPACES)
        $mail->Password = 'sdtigntkegoexazi';

        // Encryption and Port
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Sender
        $mail->setFrom(
            'sanikagaonkar0428@gmail.com',
            'Hope Foundation'
        );

        // Customer Email
        $mail->addAddress($customer_email);

        // Admin Email
        $mail->addCC('sanikagaonkar0428@gmail.com');

        // Subject
        $mail->Subject = 'Order Confirmation';

        // Body
        $mail->Body =
"Hello ".$customer_name.",

Thank you for placing your order with Hope Foundation.

Your order has been placed successfully.

Regards,
Hope Foundation";

        // Send Email
        $mail->send();

        echo "<h3>Email Sent Successfully</h3>";
    }
    catch (Exception $e)
    {
        echo "<h3>Mailer Error:</h3>";
        echo $mail->ErrorInfo;
    }
}
?>