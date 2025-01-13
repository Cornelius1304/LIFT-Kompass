$subject = "Subscription Confirmation";
$message = "Thank you for subscribing to our newsletter!";
$headers = "From: ioancorneliu07@gmail.com";

if (mail($email, $subject, $message, $headers)) {
    echo "Confirmation email sent.";
} else {
    echo "Unable to send confirmation email.";
}
