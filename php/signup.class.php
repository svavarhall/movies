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
	public $email;

	private $errors;

	function __construct()
	{
		$this->errors = array();
	}

	public function populate($data)
	{
		$this->email	= $this->get($data, 'email');
	}

	public function valid()
	{
		if ($this->email === '')
		{
			$this->errors[] = MakeError('email', 'Skrá þarf netfang');
		}

		if (strlen($this->email) > 128)
		{
			$this->errors[] = MakeError('email', 'Netfang má ekki vera lengra en 128 stafir');
		}

		//fleyrri valid email check to come...

		return sizeof($this->errors) == 0;
	}

	public function insert()
	{
		return array('email' => $this->email);
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