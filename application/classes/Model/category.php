<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_Category extends ORM {

	protected $_table_name = 'category';
	
	protected $_has_many = array(
		'articles' => array(
			'model'   => 'Article',
			'through' => 'categories_articles',
		),
	);
    
	public $_mandatory = true;
	
	public function rules()
	{
		return array();
	}
	
	public function labels()
	{
		return array();
	}

}
