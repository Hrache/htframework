<?php
class AcsCurrencyModel extends MySQLModelAbstract   {
	use ModelsTrait;
	const MODEL = 'acs_currency';
	const id = 'id';
	const currency = 'currency';
	const rules = [
		self::id => [
			'type' => 'int',
			'null' => 'NO',
			'length' => '10',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::currency => [
			'type' => 'char',
			'null' => 'NO',
			'length' => '6',
			'type_extra' => '',
			'default' => '',
		],
	];

	// int(10) unsigned
	protected $id;

	// char(6)
	protected $currency;

	function __construct(array $modelData = []) {
		parent::__construct(self::MODEL, $modelData);
	}
}
?>