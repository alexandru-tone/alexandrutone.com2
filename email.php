<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$mailOK = array();
	$mailError = array();
	$mailSucces = 'OK';
	$to = "alexandru.tone81@yahoo.com";
	$subject = "{$_POST['name']} - {$_POST['email']} ";
	$message = "{$_POST['message']}";
	$from = "{$_POST['email']}";
	$headers = "From:" . $from;
	$mail_sent = mail( $to, $subject, $message, $headers );
	header('Content-Type: application/json');
	if ($mail_sent) {
		$mailOK[] = 'Thank you for your time!';
		$mailOK[] = 'Your message has been received!';
	} else {
		$mailError[] = 'Problems receiving your email; please try again later!';
		$mailSucces = '';
	}
		echo json_encode(array('mailOK' => $mailOK, 'mailError' => $mailError, 'mailSucces' => $mailSucces));
}

