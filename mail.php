<?php
    $sEmail = $_POST['sEmail'];
    $rsEmail = [$_POST['rEmail']];
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    if(!empty($sEmail) && !empty($rEmail) && !empty($message)) {
        if(empty($subject)) {
            $subject = "(no subject)";
        }
        if(!filter_var($sEmail, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid sender's email!";
        }
        if(filter_var($rEmail, FILTER_VALIDATE_EMAIL)) {
            //$sender = "$name <$sEmail>";
            $to = "$rsEmail";
            $headers = 'From: <$sEmail>' . "\r\n";
            if(mail($to, $subject, $message, $headers)) {
                echo "Message sent";
            } else {
                echo "Failed to send your message!";
            }
        } else {
            echo "Invalid recepient's email!";
        }
    } else {
        echo "Email and message field required!";
    }
?>
