<?php
class MySQLTable {
	// @property string $name - name of the table
	private $name;

	// @property array $fields - fields of table 
	private $fields = [];

	/**
	* Description of __construct
	* @param string $name  name of the table
	* @param array $fields array of stdClass elements within field info
	**/
	function __construct(string $name, array $fields) {
		$this->name = $name;

		foreach($fields as $i => $field) {
			if (!is_object($field)) {
				continue;
			}

			$this->fields[$field->Field] = new MySQLField($field);
		}
	}

	public function __get($name) {
		return $this->$name;
	}

	public function __set($name, $value) {
		$this->$name = $value;
	}

	public function field(string $name): stdClass {
		return (isset($this->fields[$name])? $this->fields[$name] : new stdClass());
	}
}
