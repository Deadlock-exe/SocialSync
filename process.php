<?php
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $message = $_POST["message"];

  // Set the recipient email address
  $to = "deadlock.yt01@gmail.com";

  // Subject of the email
  $subject = "New Contact Form Submission";

  // Email body
  $body = "Name: $name\nEmail: $email\nMessage:\n$message";

  // Additional headers
  $headers = "From: $email";

  // Send the email
  $mailResult = mail($to, $subject, $body, $headers);

  // Return a JSON response (success or error)
  if ($mailResult) {
    echo json_encode(["status" => "success"]);
  } else {
    echo json_encode(["status" => "error", "message" => "Failed to send email"]);
  }
} else {
  // Return an error for non-POST requests
  echo json_encode(["status" => "error", "message" => "Invalid request method"]);
}
?>
