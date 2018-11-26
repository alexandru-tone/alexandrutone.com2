<?php defined('SYSPATH') or die('No direct script access.');

class HTTP_Exception_404 extends Kohana_HTTP_Exception_404 {
	
	function __construct()
	{
		echo Request::factory("/404")
			->execute()
			->send_headers()
			->body();
		
		exit;
	}
	
}
