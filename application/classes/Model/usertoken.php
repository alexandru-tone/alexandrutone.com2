<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * Default auth user toke
 *
 * @package    Kohana/Auth
 * @author     Kohana Team
 * @copyright  (c) 2007-2011 Kohana Team
 * @license    http://kohanaframework.org/license
 */
class Model_UserToken extends ORM {

	protected $_table_name = 'user_token';
	
	// Relationships
	protected $_belongs_to = array(
		'User' => array('foreign_key' => 'user_id')
	);

	/**
	 * Handles garbage collection and deleting of expired objects.
	 *
	 * @return  void
	 */
	public function __construct($id = NULL)
	{
		parent::__construct($id);

		if (mt_rand(1, 100) === 1)
		{
			$this->delete_expired();
		}

		if ($this->expires < time() AND $this->_loaded)
		{
			$this->delete();
		}
	}

	public function delete_expired()
	{
		DB::delete($this->_table_name)
			->where('expires', '<', time())
			->execute($this->_db);

		return $this;
	}

	public function create(Validation $validation = NULL)
	{
		$this->token = $this->create_token();

		return parent::create($validation);
	}

	protected function create_token()
	{
		do
		{
			$token = sha1(uniqid(Text::random('alnum', 32), TRUE));
		}
		while(ORM::factory('UserToken', array('token' => $token))->loaded());

		return $token;
	}

}
