<?php defined('SYSPATH') or die('No direct script access.');

abstract class Controller extends Kohana_Controller {
	
	function before()
	{
		parent::before();		
		$this->log();
	}
	
	function log()
	{
		$R = $_REQUEST;		
		$omit = array(
			'session',
			'password',
			'password_confirm',
			'authautologin',
			'__utma',
			'__utmb',
			'__utmc',
			'__utmz',
			'__utmv'
		);		
		foreach ($omit as $key)
		{
			if (isset($R[$key]))
			{
				unset($R[$key]);
			}
		}		
		$log = ORM::factory("Log")->values(array(
			'request_uri' => $_SERVER['REQUEST_URI'],
			'method' => ($this->request->user_agent('browser') !== FALSE) ? $this->request->method() : 'CRON',
			'is_ajax' => (int) $this->request->is_ajax(),
			'ip' => Request::$client_ip
		))->save();		
		foreach ($R as $key => $value)
		{
			if (is_array($value) || is_object($value))
			{
				$value = print_r($value, TRUE);
			}			
			ORM::factory("LogPart")->values(array(
				'log_id' => $log->id,
				'key' => $key,
				'value' => $value
			))->save();
		}
	}
	
	function log_action($action, $type = '', $reason='', $for=0)
	{
		ORM::factory("ActionLog")->values(array(
			'action' => strip_tags($action, "<a>"),
			'type' => $type,
            'user_ip' => $_SERVER['REMOTE_ADDR'],
            'reason' => strip_tags($reason),
            'creat_pentru_id' => $for,
		))->save();
	}
	
}
