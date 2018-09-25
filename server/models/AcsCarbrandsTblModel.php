<?php
class AcsCarbrandsTblModel extends MySQLModelAbstract   {
	use ModelsTrait;
	const MODEL = 'acs_carbrands_tbl';
	const id = 'id';
	const title = 'title';
	const rules = [
		self::id => [
			'type' => 'smallint',
			'null' => 'NO',
			'length' => '4',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::title => [
			'type' => 'varchar',
			'null' => 'NO',
			'length' => '100',
			'type_extra' => '',
			'default' => '',
		],
	];

	// smallint(4) unsigned
	protected $id;

	// varchar(100)
	protected $title;

	function __construct(array $modelData = []) {
		parent::__construct(self::MODEL, $modelData);
	}
}
?>