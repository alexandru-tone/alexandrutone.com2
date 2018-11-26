<?php defined('SYSPATH') or die('No direct script access.');

class Error {

	public static function display($errors = array(), $field)
	{
		if (isset($errors[$field]))
		{
			echo "<label class=\"lerror\" for=\"{$field}\">{$errors[$field]}</label>";
		}
	}

}
