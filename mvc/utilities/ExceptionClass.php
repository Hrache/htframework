<?php
class ExceptionClass extends Exception {
	private $errors = [
		0 => "Database error",
		1 => "Session error",
		2 => "Language error",
		3 => "Page error",
		4 => "Missing file error",
		5 => "Captcha error",
		6 => "Missing functionality error",
		7 => "Empty request error",
		8 => "Code error",
		9 => "Request error",
		10 => "Fatal error",
		11 => "Missing required data error",
		12 => "ErrorClass error",
		13 => "System error",
		14 => 'Signin error',
		15 => 'Missing class error',
		16 => 'Hey yo, b****',
		17 => 'Signup error',
		18 => 'Deprecated function',
		19 => 'Missing data error',
		20 => 'Constructor error',
	];
	private $errorIndex = 13;
	private $errorTitle = null;
	private $errorDate = null;

	function __construct ($message = '', int $code = 0, Exception $previous = null, Array $errors = null) {
		parent::__construct ($message, $code, $previous);

		if (!is_null ($errors)) {
			$this->errors = $errors;}

		$this->errorIndex = array_key_exists ($this->getCode(), $this->errors)? $this->getCode() : 13;
		$this->errorTitle = $this->errors [$this->errorIndex];
		$this->errorDate = date ('r');
	}

	function displayMessage (string $errorPagefile) {
		require_once $errorPagefile;
	}

	function setPageFile (string $errorPagefile): ExceptionClass {
		$this->errorPagefile = $errorPagefile;
		return $this;
	}

	function getPageFile(): string {
		return $this->errorPagefile;
	}

	function getErrorTextByIndex (int $index): string {
		return $this->errors [$index];
	}

	function setErrors (array $errors): ExceptionClass {
		return $this;
	}
}
?>