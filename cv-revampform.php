<?php
    if(isset($_POST['submit'])) 
    {
        
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $mailFrom = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];
        $message = $_POST['comments'];
        $file=$_FILES["cv"]["name"];
        // $mailto = "hello@womenpreneursng.com";
        $mailto = "gbubemimakpokpomi@gmail.com";

        $content = file_get_contents($file);
        $content = chunk_split(base64_encode($content));
    
        // a random hash will be necessary to send mixed content
        $separator = md5(time());
    
        // carriage return type (RFC)
        $eol = "\r\n";
    
        // main header (multipart mandatory)
        $headers = "From: name <test@test.com>" . $eol;
        $headers .= "MIME-Version: 1.0" . $eol;
        $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
        $headers .= "Content-Transfer-Encoding: 7bit" . $eol;
        $headers .= "This is a MIME encoded message." . $eol;
    
        // message
        $body = "--" . $separator . $eol;
        $body .= "Content-Type: text/plain; charset=\"iso-8859-1\"" . $eol;
        $body .= "Content-Transfer-Encoding: 8bit" . $eol;
        $body .= "Good day, Kindly help me review my CV" . $eol;
        $body .= "First name: " . $firstname . ", Last name: " . $lastname . $eol;
        $body .= "Email " . $mailFrom .  ", Phone Number: " . $phonenumber . $eol;
        $body .= "Additionsl Information: " . $message . $eol;
    
        // attachment
        $body .= "--" . $separator . $eol;
        $body .= "Content-Type: application/octet-stream; name=\"" . $file . "\"" . $eol;
        $body .= "Content-Transfer-Encoding: base64" . $eol;
        $body .= "Content-Disposition: attachment" . $eol;
        $body .= $content . $eol;
        $body .= "--" . $separator . "--";
    
        //SEND Mail
        if (mail($mailto, $subject, $body, $headers)) {
            header("Location: https://flutterwave.com/pay/womenpreneurse9ec");
            exit();
        } else {
            echo "mail send ... ERROR!";
            print_r( error_get_last() );
        }
    }


?>

