<?php 
//print_r($_REQUEST);
//check if the necessary data was sent
if (isset($_REQUEST['name']) && isset($_REQUEST['emailaddress']) && isset($_REQUEST['comment']) && $_REQUEST['name'] !='' && $_REQUEST['emailaddress'] !='' && $_REQUEST['comment'] !='')
{
	require_once "Mail.php";
	//change back to include mom's email address as well
		//$to      = 'susiechisolm@gmail.com,maxstruever@gmail.com';
		$to      = 'maxstruever@gmail.com';
	$subject = 'Executive Welcome Contact from "'.$_REQUEST['name'].'"';
	$body = 'From: '.$_REQUEST['name']. "\r\n" .'Email: '.$_REQUEST['emailaddress']. "\r\n".'Phone: '.$_REQUEST['phone1'].'\r\n' .'Message:'. "\r\n" .$_REQUEST['comment'];

	$from = "Executive Welcome Contact Form <site@executivewelcome.net>";

	$email = $_REQUEST['emailaddress'];
	$headers = 'From: ' . $from . "\r\n" .
							'Reply-To: ' . $email . "\r\n" .
						'X-Mailer: PHP/' . phpversion();


	if (mail($to, $subject, $body, $headers))
		header("Location: ./?contactsentsuccess=true#contact");
	else
		echo 'Error with sending mail, <a href="Javascript:history.go(-1);">Go Back</a>';

}
else
	echo 'Error with sending mail, not all data present <a href="Javascript:history.go(-1);">Go Back</a>';

?>
