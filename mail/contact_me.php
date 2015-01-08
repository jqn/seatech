<?php
// Check for empty fields
if(empty($_POST['name'])  		||
empty($_POST['email']) 		||
empty($_POST['candidate']) 	||
empty($_POST['emailcandidate'])	||
!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
{
  echo "No arguments Provided!";
  var_dump($_POST);
  http_response_code(400);
  return false;
}

$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = isset($_POST['phone']) ? $_POST['phone']:"";
$candidate = $_POST['candidate'];
$linkedin =  isset($_POST['linkedin']) ?$_POST['linkedin']:"" ;
$emailcandidate = $_POST['emailcandidate'];
$message = isset($_POST['message']) ? $_POST['message'] : "";

// Create the email and send the message
$to = 'rsalota@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your referrals contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nCandidate: $candidate\n\nCandidate Email: $emailcandidate\n\nlinkedin: $linkedin\n\nMessage:\n$message";
$headers = "From: noreply@seatech.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";
mail($to,$email_subject,$email_body,$headers);
return true;
?>
