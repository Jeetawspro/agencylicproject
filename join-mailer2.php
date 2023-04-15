<?php
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['mobile'];
$call = $_POST['qualification'];
$age = $_POST['age'];
$priority = $_POST['occupation'];
$message = $_POST['message'];
//$message = $_POST['message'];message
//$type = $_POST['type']; \n Type: $type

$formcontent=" From: $name \n Phone: $phone \n Email: $email \n Qualification: $call \n Age: $age \n Occupation: $priority \n Message: $message";
//$recipient = "careerinlicagency@gmail.com";
//$recipient = "frameboxconsultancy@gmail.com";
$recipient = "joinnow@careerinlicagency.com";
$subject = "New Enquiry - Join Now on Website";
$mailheader = "From: $recipient \r\n"; 'X-Mailer: PHP/' . phpversion();
//$mailheader = "From: joinnow@careerinlicagency.com \r\n"; 'X-Mailer: PHP/' . phpversion();
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
echo "Thank You! Your mail has been sent successfully.";
//header("Location: https://careerinlicagency.com/join.html");

?>

