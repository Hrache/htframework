<?php
class AcsModelsTblModel extends MySQLModelAbstract   {
	use ModelsTrait;
	const MODEL = 'acs_models_tbl';
	const model = 'model';
	const structure = 'structure';
	const rules = [
		self::model => [
			'type' => 'char',
			'null' => 'NO',
			'length' => '25',
			'type_extra' => '',
			'default' => '',
		],
		self::structure => [
			'type' => 'varchar',
			'null' => 'NO',
			'length' => '16000',
			'type_extra' => '',
			'default' => '',
		],
	];

	// char(25)
	protected $model;

	// varchar(16000)
	protected $structure;

	function __construct(array $modelData = []) {
		parent::__construct(self::MODEL, $modelData);
	}
}
?>