<?php
error_reporting(E_ALL); 
ini_set('display_errors', 1);
require_once("PhpMailer/class.phpmailer.php");
	function sendMailJS($to,$subject,$msg,$headers='',$file="") {
		
		$fname='ubiAttendance';
		$userName = 'ubiattendance@ubitechsolutions.com';
		
		// Instantiate a new PHPMailer 
		$mail = new PHPMailer;
			
		// Tell PHPMailer to use SMTP
		$mail->isSMTP();

		// Replace sender@example.com with your "From" address. 
		// This address must be verified with Amazon SES.
		$mail->setFrom($userName, $fname);

		// Replace recipient@example.com with a "To" address. If your account 
		// is still in the sandbox, this address must be verified.
		// Also note that you can include several addAddress() lines to send
		// email to multiple recipients.
		$mail->addAddress($to);

		// Replace smtp_username with your Amazon SES SMTP user name.
		$mail->Username = 'AKIAINHTNV5UDYHKLUHA';

		// Replace smtp_password with your Amazon SES SMTP password.
		$mail->Password = 'Aj3bqCkDsPYRWH6impKmMeRXbyspo0yP3/MC1F8j1b4K';

		// Specify a configuration set. If you do not want to use a configuration
		// set, comment or remove the next line.
		//$mail->addCustomHeader('X-SES-CONFIGURATION-SET', 'ConfigSet');

		// If you're using Amazon SES in a region other than US West (Oregon), 
		// replace email-smtp.us-west-2.amazonaws.com with the Amazon SES SMTP  
		// endpoint in the appropriate region.
		$mail->Host = 'email-smtp.us-west-2.amazonaws.com';

		// The subject line of the email
		$mail->Subject = $subject;

		// The HTML-formatted body of the email
		$mail->Body = $msg;

		// Tells PHPMailer to use SMTP authentication
		$mail->SMTPAuth = true;

		// Enable TLS encryption over port 587
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;

		// Tells PHPMailer to send HTML-formatted email
		$mail->isHTML(true);
		
		if($file!="")
		$mail->AddAttachment($file);
		// The alternative email body; this is only displayed when a recipient
		// opens the email in a non-HTML email client. The \r\n represents a 
		// line break.
		//$mail->AltBody = "Email Test\r\nThis email was sent through the Amazon SES SMTP interface using the PHPMailer class.";
		//echo 'aa';
		if(!$mail->send()) {
			echo 'aa';
		//echo "Email not sent. " , $mail->ErrorInfo , PHP_EOL;
		$err=$mail->ErrorInfo;
		//echo "Email not sent!" , PHP_EOL;
		//Trace($err);
		//return false;
		} else {
		//echo "Email sent!" , PHP_EOL;
		//return true;
		}
		echo 'aa';
		
		/* $url = "https://ubipublication.com/ubiattendance/index.php/cron/sendMailAWS";
		$ch  = curl_init($url);
		$arr = array(
			'to' => $to,
			'subject' => $subject,
			'msg' => $msg
		);
		
		$payload = json_encode($arr);
		
		//$arrval = str_replace("\\","",$arrval);
		//Trace($payload);
		//attach encoded JSON string to the POST fields
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		
		//set the content type to application/json
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type:application/json'
		));
		
		//return response instead of outputting
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
		//execute the POST request
		$result = curl_exec($ch);
		
		//close cURL resource
		curl_close($ch);
		return true; */
	}
	
	sendMailJS("deeksha@ubitechsolutions.com",'Test Mail','Testing');
?>
<html>
 <head>
 </head>
 
  <body>
    <center>
	 <strong><br /></br/> <span style="font-size:20px">Transaction is Cancelled</span></strong>
	</center>
  </body>
 </html>