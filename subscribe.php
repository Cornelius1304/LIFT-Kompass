<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $file = 'subscribers.txt';
        
        if (file_exists($file)) {
            $subscribers = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            if (in_array($email, $subscribers)) {
                echo "You are already subscribed!";
                exit;
            }
        }

        file_put_contents($file, $email . PHP_EOL, FILE_APPEND | LOCK_EX);
        echo "Thank you for subscribing!";
    } else {
        echo "Invalid email address.";
    }
} else {
    echo "Invalid request method.";
}
?>
