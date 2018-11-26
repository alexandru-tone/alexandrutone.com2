<?php
function validare_email() {
	if (!preg_match('/^[\w-.]+@[a-z-]+(\.[a-z-]+)+$/', $_POST['email']) ) {
		return false;
	}		
	return true;
}
if($_SERVER['REQUEST_METHOD'] === 'POST'){
	
session_start();
	
	$emailErrors = array();
	$emailSucces = 'OK';
	if( !isset($_POST['message']) || !$_POST['message'] ){
		$emailErrors[] = 'Please enter your message!';
		$emailSucces = '';			
	}
	if( !isset($_POST['name']) || !$_POST['name'] ){
		$emailErrors[] = 'Please enter your name!';
		$emailSucces = '';			
	}
	if ( !isset($_POST['email']) || !$_POST['email'] ) {
		$emailErrors[] = 'Please enter your email!';
		$emailSucces = '';
	} elseif (!validare_email()) {
		$emailErrors[] = 'This email is invalid!';
		$emailSucces = '';
	}
	if (empty($_SESSION['captcha']) || $_POST['captcha'] != $_SESSION['captcha']) {
		$emailErrors[] = 'Invalid captcha';
		$emailSucces = '';
	}
	header('Content-Type: application/json');
	echo json_encode(array('emailErrors' => $emailErrors, 'emailSucces' => $emailSucces));
} 