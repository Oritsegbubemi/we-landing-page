<?php
    if(isset($_POST['submit'])) 
    {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $mailFrom = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];
        $message = $_POST['comments'];
        $mailto = "hello@womenpreneursng.com";
        $mailtoName = "Womenpreneurs Africa";
        $subject = "Womenpreneurs CV Revamp";
        $file_name = $_FILES['cv']['name'];
        $file_tmp = $_FILES['cv']['tmp_name'];

        require ('/home/womenpre/public_html/PHPMailer/src/Exception.php');
        require ('/home/womenpre/public_html/PHPMailer/src/PHPMailer.php');
        require ('/home/womenpre/public_html/PHPMailer/src/SMTP.php');

        $mail = new PHPMailer\PHPMailer\PHPMailer();

        $mail->From = $mailFrom;
        $mail->FromName = $firstname . " " . $lastname;
        $mail->addAddress($mailto, $mailtoName);
        $mail->addAttachment($file_tmp, $file_name);  
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = "
        Good day, Kindly help me revamp my CV<br>
        First name:  $firstname<br>
        Last name: $lastname<br>
        Email: $mailFrom<br>
        Phone Number: $phonenumber<br><br>
        Additional Information: $message";
        $mail->AltBody = "This is an alternative message";

        try {
            $mail->send();
            header("Location: https://flutterwave.com/pay/57dabxiftncy");
            exit();
        } catch (Exception $e) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
    }
?>

