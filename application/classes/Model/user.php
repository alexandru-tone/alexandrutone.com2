<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_User extends ORM {

	protected $_table_name = 'user';
	
	protected $_belongs_to = array(
	);
    
	protected $_has_many = array(
		'UserToken' => array('foreign_key' => 'user_id'),
		'ActionLog' => array('foreign_key' => 'creat_de_id'),
	);
	
	public function rules()
	{
		return array(
			'tip' => array(
				array('not_empty'),
			),
			'password' => array(
				array('not_empty'),
			),
			'email' => array(
				array('not_empty'),
				array('email'),
				//array(array($this, 'unique_key_exists'), array(':field', ':value')),
			),
			'username' => array(
				array('not_empty'),
				array(array($this, 'unique_key_exists'), array(':field', ':value')),
			),
		);
	}

	public function filters()
	{
		return array(
			'password' => array(
				array(array(Auth::instance(), 'hash'))
			)
		);
	}

	public function labels()
	{
		return array(
		);
	}

	public function complete_login()
	{
		if ($this->_loaded)
		{
			// Update the number of logins
			$this->logins = new Database_Expression('logins + 1');

			// Set the last login date
			$this->last_login = date("Y-m-d H:i:s");

			// Save the user
			$this->update();
		}
	}


	public function unique_key_exists($field = NULL, $value = NULL)
	{
		if ($field === NULL)
		{
			// Automatically determine field by looking at the value
			$field = $this->unique_key($value);
		}

//		return ! (bool) DB::select(array('COUNT("*")', 'total_count'))
		return ! (bool) DB::select(array(DB::expr('COUNT(*)'), 'total_count'))
			->from($this->_table_name)
			->where($field, '=', $value)
			->where('deleted', '=', '0')
			->where($this->_primary_key, '!=', $this->pk())
			->execute($this->_db)
			->get('total_count');
	}

	public function unique_key($value)
	{
		return Valid::email($value) ? 'email' : 'username';
	}

	public static function get_password_validation($values)
	{
		return Validation::factory($values)
			->rule('password', 'min_length', array(':value', 3))
			->rule('password_confirm', 'matches', array(':validation', 'password', 'password_confirm'));
	}

	public function create_user($values, $expected = NULL)
	{
		$extra_validation = Model_User::get_password_validation($values)
			->rule('password', 'not_empty');

		return $this->values($values, $expected)->create($extra_validation);
	}

	public function update_user($values, $expected = NULL)
	{
		if (empty($values['password']))
		{
			unset($values['password'], $values['password_confirm']);
		}

		$extra_validation = Model_User::get_password_validation($values);

		return $this->values($values, $expected)->update($extra_validation);
	}
	
	function name()
	{
		return $this->name;
	}
	
	function short_name()
	{
		return $this->Text->prenume . " " . substr($this->Text->nume, 0, 1) . ".";
	}

}
