<?php

/**
* Validation entry object
* @author Max Pyger
*/
class ValidationEntry
{
	/**
	* @var integer Email
	*/
	const TypeEmail = 0x000;

	/**
	* @var integer URL
	*/
	const TypeURL = 0x001;

	/**
	* @var integer Password
	*/
	const TypePassword = 0x002;

	/**
	* @var integer Confirm
	*/
	const TypeConfirm = 0x003;

	/**
	* @var integer HTML Select
	*/
	const TypeSelect = 0x004;

	/**
	* @var integer Radio
	*/
	const TypeRadio = 0x005;

	/**
	* @var integer HTML Checkbox
	*/
	const TypeCheckbox = 0x006;

	/**
	* @var integer Numeric data
	*/
	const TypeNumeric = 0x007;

	/**
	* @var integer Simple Text
	*/
	const TypeSimpleString = 0x008;

	/**
	* @var integer Normal Text
	*/
	const TypeNormalString = 0x009;

	/**
	* @var integer Full Text
	*/
	const TypeFullString = 0x010;

	/**
	* @var string Regular expression
	*/
	const RuleRegEx = 0x011;

	/**
	* @var integer The minimal length
	*/
	const RuleMinLength = 0x012;

	/**
	* @var integer The maximum length
	*/
	const RuleMaxLength = 0x013;

	/**
	* @var int Range for value to belong to
	*/
	const RuleRange = 0x014;

	/**
	* @var int Format for the date
	*/
	const RuleFormat = 0x015;

	/**
	* @var int the type of the rule
	*/
	const Type = 0x015;

	/**
	* @var int The data-source indicator
	*/
	const DataSource = 0x016;

	/**
	* @var int The value of the entry
	*/
	const EntryValue = 0x017;

	/**
	* @var ArrayClass The validation rules for the entry
	*/
	private $rules;

	/**
	* @var string The HTML name of the entry
	*/
	private $name;

	/**
	* @var mixed The data that'll be validated
	*/
	private $data;

	/**
	* @var mixed The source of data for $data validation
	*/
	private $dataSource = null;

	/**
	* Simple class constructor for ValidationEntry Class
	* @param string $name The index of the entry  ((the identifier), _POST, _GET or any other array)
	* @param mixed $value The value of the entry which will be validated
	* @param mixed $dataSource The source of data for being processed for the value
	* @return void
	*/
	function __construct(string $name, $value, $dataSource = null)
	{
		$this->name = $name;
		$this->value = $value;
		$this->dataSource = $dataSource;
		$this->rules = new ArrayClass();
	}

	/**
	* Add a rule to the set of rules for an entry
	* @param int|string $type The type of the rule
	* @param int|string|null $rule The rule by itself (by default is null)
	* @return ValidationClass The same instance of the current
	* object for a chaining
	*/
	function addRule($type, $rule = null): ValidationEntry
	{
		$this->rules->add($type, $rule);
		
		return $this;
	}

	/**
	* Validates current single entry
	* @return bool Returns TRUE in case of success,
	* false on the opposite case
	*/
	function validate(): bool
	{
		// TODO: write validation code
	}

	public function getRules(): ArrayClass
	{
		return $this->rules;
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function setRules(ArrayClass $rules): ValidationEntry
	{
		$this->rules = $rules;

		return $this;
	}

	public function setName($name): ValidationEntry
	{
		$this->name = $name;
		
		return $this;
	}

	public function getData()
	{
		return $this->data;
	}

	public function getDataSource()
	{
		return $this->dataSource;
	}

	public function setData($data): ValidationEntry
	{
		$this->data = $data;
		
		return $this;
	}

	public function addDataSource($dataSource): ValidationEntry
	{
		$this->dataSource = $dataSource;
		
		return $this;
	}
}