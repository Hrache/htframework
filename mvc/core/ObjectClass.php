<?php
class ObjectClass {
	protected $lastMethod = null;
	function __construct() {}

	function __get($property) {
		if ($this->$property) {
			return $this->$property;
		}

		die($property);
	}

	function __set($property, $value) {
		if ($this->$property) {
			$this->$property = $value;
		}

		die('\$property \= \$value;');
	}
}
?>