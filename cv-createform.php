<?php
    if(isset($_POST['submit'])) 
    {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $mailFrom = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];
        $address = $_POST['address'];
        $linkedin = $_POST['linkedin'];
        $personal = $_POST['personal'];
        $professional = $_POST['professional'];
        $academic = $_POST['academic'];
        $skills = $_POST['skills'];
        $certificates = $_POST['certificates'];
        $references = $_POST['references'];
        $message = $_POST['comments'];

        $mailto = "hello@womenpreneursng.com";
        $headers = "From: ".$mailFrom;
        $subject = "Womenpreneurs Create New CV";

        // carriage return type (RFC)
        $eol = "\r\n";

        // message
        $body .= "Content-Transfer-Encoding: 8bit" . $eol;
        $body .= "Good day, Kindly help me review my CV" . $eol;
        $body .= "First name: " . $firstname . ", Last name: " . $lastname . $eol;
        $body .= "Email " . $mailFrom .  ", Phone Number: " . $phonenumber . $eol;
        $body .= "Home Address " . $address . $eol;
        $body .= "LinkedIn Profile " . $linkedin . $eol;
        $body .= "Personal Statement " . $personal . $eol;
        $body .= "Professional Statement " . $professional . $eol;
        $body .= "Academic Background " . $academic . $eol;
        $body .= "Key Skills and Qualifications " . $skills . $eol;
        $body .= "Certificates " . $certificates . $eol;
        $body .= "References " . $references . $eol;
        $body .= "Additional Information: " . $message . $eol;
    
        //SEND Mail
        if (mail($mailto, $subject, $body, $headers)) {
            header("Location: https://flutterwave.com/pay/9ckqnumdupq9");
            exit();
        } else {
            echo "mail send ... ERROR!";
            print_r( error_get_last() );
        }
    }
?>

