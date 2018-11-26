<?php defined('SYSPATH') or die('No direct script access.');

class Controller_404 extends Controller_Layout
{
	function action_index()
	{
		$this->template->content = View::factory("template/404");
	}
	
}
