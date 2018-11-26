<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_LogPart extends ORM {

	protected $_table_name = 'log_part';
	
	protected $_belongs_to = array(
		'Log' => array('foreign_key' => 'log_id')
	);
	
}
