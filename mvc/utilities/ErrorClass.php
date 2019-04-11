<?php
class ErrorClass {
	private $errors;

	function __construct() {
		$this->errors = new ArrayClass([]);
	}

	function setSingleError($index, bool $value): ErrorClass {
		$this->errors->add( $index, $value); return $this;
	}

	function getSingleError(string $index): bool {
		return $this->errors->item($index);
	}

	function getErrors(): Array {
		return $this->errors->inputArray();
	}

	function setErrors(Array $errors): ErrorClass {
		$this->errors = $errors; return $this;
	}
}
?>