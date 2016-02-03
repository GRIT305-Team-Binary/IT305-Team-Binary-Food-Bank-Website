<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Thank You</title>
    </head>
    <body>
            <?php
            
                $recipient = 'nicolerbassen@gmail.com';
                $valid = true;
                
                // Validate name
                if (!empty($_POST['name'])) {   // if field is not empty
                    $first = $_POST['name'];    // assign to a variable
                } else {                        // otherwise
                    echo "<p>Please enter a first name.</p>";   // print an error message
                    $valid = false;
                }
                
                // Validate email address
                if (!empty($_POST['email'])) {   // if field is not empty
                    $email = $_POST['email'];    // assign to a variable
                } else {                        // otherwise
                    echo "<p>Please enter an e-mail address.</p>";   // print an error message
                    $valid = false;
                }
                
                // Check for a subject
                if (!empty($_POST['subject'])) {
                    $subject = $_POST['subject'];
                } else {
                    $subject = "No subject";
                }
                
                // Validate message
                if (!empty($_POST['message'])) {   // if field is not empty
                    $email = $_POST['message'];    // assign to a variable
                } else {                        // otherwise
                    echo "<p>Please enter a message.</p>";   // print an error message
                    $valid = false;
                }
                

                
                // Send e-mail if all fields are valid
                if ($valid) {
                    @mail($recipient, $subject, $message,
                          "From: $name <$email>",
                          "Reply-to: $name <$email>");
                    echo("<p>Thank you for contacting us.</p>");
                }
                
            ?>
    </body>
</html>