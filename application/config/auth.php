<?php defined('SYSPATH') or die('No direct access allowed.');

return array(

	'driver'       => 'ORM',
	'hash_method'  => 'sha512',
	'hash_key'     => 'A1365ED2956D1B4A5C3B675E5D6FA93B09670854768F22AD61E180264449C1A5',
	'salt_pattern' => '1, 2, 4, 9, 14, 18, 20, 25, 28, 30',
	'lifetime'     => 1209600, // 2 saptamani
	'session_type' => Session::$default,
	'session_key'  => 'auth_user',

	// Username/password combinations for the Auth File driver
	'user' => array(
		// 'admin' => 'b3154acf3a344170077d11bdb5fff31532f679a1919e716a02',
	),

);
