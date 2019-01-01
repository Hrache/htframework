<?php

class FieldRules extends ObjectClass
{
	const RULE_LENGTH = 'length';
	const RULE_TYPE_EXTRA = 'type_extra';
	const RULE_NULL = 'null';
	const RULE_DEFAULT = 'default';
	const RULE_TYPE = 'type';
	const RULE_ENUM = 'enum';

	private $length;
	private $type_extra;
	private $null;
	private $default;
	private $type;
	private $enum;

	function __construct(stdClass $rules)
	{
		$this->length = isset($rules->length) ? $rules->length : '';
		$this->type_extra = isset($rules->type_extra) ? $rules->type_extra : '';
		$this->null = isset($rules->null) ? $rules->null : '';
		$this->default = isset($rules->default) ? $rules->default : '';
		$this->enum = isset($rules->enum) ? $rules->enum : '';
		$this->type = isset($rules->type) ? $rules->type : '';
	}
}