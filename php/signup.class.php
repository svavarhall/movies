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
		$this->email = $this->get($data, 'email');
	}

	public function valid()
	{
		if(!filter_var($this->email, FILTER_VALIDATE_EMAIL))
		{
			$this->errors[] = MakeError('email', 'Þetta er ekki netfang, reyndu aftur...');
		}

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