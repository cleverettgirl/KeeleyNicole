<?php

    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form fields and remove whitespace.
        $name = strip_tags(trim($_POST["name"]));
				$name = str_replace(array("\r","\n"),array(" "," "),$name);
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $number = strip_tags(trim($_POST["number"]));
        $message = trim($_POST["message"]);



        // Check that data was sent to the mailer.
        if ( empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Oops! There was a problem with your submission. Please complete the form and try again.";
            exit;
        }

        // Set the recipient email address.
        // FIXME: Update this to your desired email address.
        $recipient = "dkelmanson@gmail.com";

        // Set the email subject.
        $subject = "New contact from $name";

        // Build the email content.
        $email_content = "Name: $name\n";
        $email_content .= "Email: $email\n\n";
        $email_content .= "Phone: $number\n\n";
        $email_content .= "Message:\n$message\n";

        // Build the email headers.
        $email_headers = "From: $name <$email>";
        
        // if ($mail){
        //     echo "WORKS";
        // } else {
        //     echo "FUCK";
        // }
        
        // Send the email.
        if (mail($recipient, $subject, $message, $email_content)) {
            // Set a 200 (okay) response code.
            
            http_response_code(200);
            echo "Thank You! Your message has been sent.";
        } else {
            // Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "Oops! Something .";
        }

    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }
    
    
    $body = <<<EOD
        <br><hr><br>
        Name: $name <br>
        Email: $email <br>
        Number: $number <br>
        Message: $message <br>

EOD;
        $headers = "From: $email\r\n";
        $headers .= "Content-type: text/html\r\n";
        
        $success = mail($webMaster, $emailSubject, $body, $headers);
        
        $theResults = <<<EOD
EOD;


echo "$theResults";

?> 