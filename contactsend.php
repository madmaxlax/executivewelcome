<?php 
//print_r($_REQUEST);
//check if the necessary data was sent
if (isset($_REQUEST['name']) && isset($_REQUEST['emailaddress']) && isset($_REQUEST['comment']) && $_REQUEST['name'] !='' && $_REQUEST['emailaddress'] !='' && $_REQUEST['comment'] !='')
{
	//requiring not necessary in php7
	//require_once "Mail.php";
	
	//change back to include mom's email address as well
		$to      = 'schisolm@executivewelcome.net,maxstruever@gmail.com';
		//$to      = 'maxstruever@gmail.com';
	$subject = 'Executive Welcome Contact from "'.$_REQUEST['name'].'"';
	$body = 'From: '.$_REQUEST['name']. "\r\n" .'Email: '.$_REQUEST['emailaddress']. "\r\n".'Phone: '.$_REQUEST['phonenumber']."\r\n" .'Message:'. "\r\n" .$_REQUEST['comment'];

	$from = "Executive Welcome Contact Form <site@executivewelcome.net>";

	$email = $_REQUEST['emailaddress'];
	$headers = 'From: ' . $from . "\r\n" .
							'Reply-To: ' . $email . "\r\n" .
						'X-Mailer: PHP/' . phpversion();
	
	//Google Captcha checker
	
	if(isset($_POST['g-recaptcha-response'])){
		$captcha=$_POST['g-recaptcha-response'];
	}
	$secret = '6Lds8xMUAAAAAJkOm3xh3CUAgktiDvEnQbEu2Kes';
	$response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
	if($response['success'] == false)
	{
		echo '<h2>You have been detected as a spammer, please go back and ensure you checked the box "I am no a robot"<a href="Javascript:history.go(-1);">Go Back</a></h2>';
	}
	else //good, send email
	{
		//returns true if sending was successful
		if (mail($to, $subject, $body, $headers)){
			//redirect back to page
			header("Location: ./?contactsentsuccess=true#contact");
		}
		else
			echo 'Error with sending mail, <a href="Javascript:history.go(-1);">Go Back</a>';
	}


}
else
	echo 'Error with sending mail, not all data present <a href="Javascript:history.go(-1);">Go Back</a>';

?>
