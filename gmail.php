<?php
//ini_set('display_errors', '0');
date_default_timezone_set('Etc/UTC');

// Edit this path if PHPMailer is in a different location.
require './PHPMailer/PHPMailerAutoload.php';

if(isset($_POST['name']))
{
//	echo "Send succesfully";
$mail = new PHPMailer;
$mail->isSMTP();

//$mail->SMTPDebug = 4;
/*
 * Server Configuration
 */

$mail->Host = 'smtp.gmail.com'; // Which SMTP server to use.
$mail->Port = 587; // Which port to use, 587 is the default port for TLS security.
$mail->SMTPSecure = 'tls'; // Which security method to use. TLS is most secure.
$mail->SMTPAuth = true; // Whether you need to login. This is almost always required.
$mail->Username = "remaxrealtypune@gmail.com"; // Your Gmail address.
$mail->Password = "NoPassword2019"; // Your Gmail login password or App Specific Password.

/*
 * Message Configuration
 */
// $name = strip_tags($_POST['name']); 
$name = strip_tags($_POST['name']); 
$email = strip_tags($_POST['email']); 
$mobile= strip_tags($_POST['mobile']); 
//  $message = strip_tags($_POST['message']);
$message=isset($_POST['message']) ? strip_tags($_POST['message']):"No Message for us";

$sendmessage = "Name:$name \n Email id: $email \n Mobile No: $mobile \n Message: $message";
  
$mail->setFrom('admin@beverlyhills-TowerD.co.in', 'Smartivate'); // Set the sender of the message.
$mail->addAddress('sonalijatti19@gmail.com', 'Smartivate Tutorial'); // Set the recipient of the message.
$mail->Subject = 'Beverlyhills-TowerD Contact'; // The subject of the message.

/*
 * Message Content - Choose simple text or HTML email
 */

$mail->Body = $sendmessage;
// Choose to send either a simple text email...
//$mail->Body = 'This is a plain-text message body'; // Set a plain text body.

// ... or send an email with HTML.
//$mail->msgHTML(file_get_contents('contents.html'));
// Optional when using HTML: Set an alternative plain text message for email clients who prefer that.
//$mail->AltBody = 'This is a plain-text message body'; 

// Optional: attach a file
//$mail->addAttachment('32pd/fav.png');
if ($mail->send()) {
	$status = '<span style="color:#333333;">Thanks '.$name.', We will contact you shortly.</span>';
	 // echo "$name message send successfully";
	 // "<script type='text/javascript'>
	      // alert('Thanks " . $name .", We will contact you shortly.');
	// </script>"; 
	 echo $status;
} else {
	$status = 'err';
    // echo "Mailer Error: " . $mail->ErrorInfo;
    echo $status;
// }
}
}
// else conditional statement for if(isset($_POST['submit']))
else {
echo "Sorry, you cannot do that from here. Please fill in the form first.";
}

?>