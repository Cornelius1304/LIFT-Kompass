<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the email from the form
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);

    // Validate the email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Save the email to a text file
        $file = 'subscribers.txt';
        
        // Check if the email is already subscribed
        if (file_exists($file)) {
            $subscribers = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            if (in_array($email, $subscribers)) {
                echo "You are already subscribed!";
                exit;
            }
        }

        // Append the email to the file
        file_put_contents($file, $email . PHP_EOL, FILE_APPEND | LOCK_EX);
        echo "Thank you for subscribing!";
    } else {
        echo "Invalid email address.";
    }
} else {
    echo "Invalid request method.";
}
?>
