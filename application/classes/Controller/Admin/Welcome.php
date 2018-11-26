<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Welcome extends Controller_Admin {

	public function action_index()
	{
		$this->template->content = "hello admin";
	}

}
