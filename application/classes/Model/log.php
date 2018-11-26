<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_Log extends ORM {

	protected $_table_name = 'log';
	
	protected $_has_many = array(
		'LogPart' => array('foreign_key' => 'log_id')
	);
	
}
