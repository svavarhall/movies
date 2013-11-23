<?php

class ValidationError
{
	public $field;
	public $error;
}

function MakeError($field, $error)
{
	$o = new ValidationError();
	$o->field = $field;
	$o->error = $error;

	return $o;
}

class Signup
{
	public $username;
	public $password;

	private $errors;

	function __construct()
	{
		$this->errors = array();
	}

	public function populate($data)
	{
		$this->username	= $this->get($data, 'username');
		$this->password = $this->get($data, 'password');
	}

	public function valid()
	{
		if ($this->username === '')
		{
			$this->errors[] = MakeError('username', 'Velja þarf notandanafn');
		}
		if($this->password === '')
		{
			$this->errors[] = MakeError('password','Velja þarf lykilorð');
		}

		if (strlen($this->username) > 128)
		{
			$this->errors[] = MakeError('username', 'Notandanafn má ekki vera lengra en 128 stafir');
		}
		if (strlen($this->password) < 8)
		{
			$this->errors[] = MakeError('password','Lykilorð verður að vera 8 stafir eða lengra að lengd');
		}
		return sizeof($this->errors) == 0;
	}

	public function insert()
	{
		return array('username' => $this->username,
					 'password'=> $this->password);
	}

	public function errors()
	{
		return $this->errors;
	}

	private function get($array, $key)
	{
		if (isset($array[$key]))
		{
			return $array[$key];
		}

		return '';
	}
}