<?php
class AcsCarmodelsTblModel extends MySQLModelAbstract   {
	use ModelsTrait;
	const MODEL = 'acs_carmodels_tbl';
	const id = 'id';
	const brand_id = 'brand_id';
	const title = 'title';
	const rules = [
		self::id => [
			'type' => 'smallint',
			'null' => 'NO',
			'length' => '4',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::brand_id => [
			'type' => 'smallint',
			'null' => 'NO',
			'length' => '6',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::title => [
			'type' => 'varchar',
			'null' => 'NO',
			'length' => '255',
			'type_extra' => '',
			'default' => '',
		],
	];

	// smallint(4) unsigned
	protected $id;

	// smallint(6) unsigned
	protected $brand_id;

	// varchar(255)
	protected $title;

	function __construct(array $modelData = []) {
		parent::__construct(self::MODEL, $modelData);
	}
}
?>