<?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = htmlspecialchars($_POST['name']);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $message = htmlspecialchars($_POST['message']);
            
            $to = "rslkarora123@outlook.com";
            $subject = "New Contact Message from $name";
            $headers = "From: $email\r\n" .
                       "Reply-To: $email\r\n" .
                       "Content-Type: text/plain; charset=UTF-8";
            
            $body = "Name: $name\n";
            $body .= "Email: $email\n\n";
            $body .= "Message:\n$message\n";
            
            if (mail($to, $subject, $body, $headers)) {
                echo "<p style='color:green;'>Message sent successfully!</p>";
            } else {
                echo "<p style='color:red;'>Message sending failed.</p>";
            }
        }
        ?>