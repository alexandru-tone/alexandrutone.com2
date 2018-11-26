<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_Article extends ORM {

	protected $_table_name = 'article';
	
	protected $_has_many = array(
		'categories' => array(
			'model'   => 'Category',
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

