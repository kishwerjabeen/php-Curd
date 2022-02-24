<?php
$to_email = "kishwarjabeen2020@gmail.com";
$subject = "Simple Email Test via PHP";
$body = "Hi,  ya email chlrhe ha This is test email send by PHP Script";
$headers = "Form : codingtest20222022@gmail.com";

if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}
