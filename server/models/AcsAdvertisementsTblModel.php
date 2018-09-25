<?php
class AcsAdvertisementsTblModel extends MySQLModelAbstract   {
	use ModelsTrait;
	const MODEL = 'acs_advertisements_tbl';
	const id = 'id';
	const payedorfree = 'payedorfree';
	const buyorsell = 'buyorsell';
	const vehicleprice = 'vehicleprice';
	const currency = 'currency';
	const account_id = 'account_id';
	const car_id = 'car_id';
	const datecreated = 'datecreated';
	const description = 'description';
	const country = 'country';
	const state = 'state';
	const cityorprovince = 'cityorprovince';
	const mainaddress = 'mainaddress';
	const altaddress = 'altaddress';
	const rules = [
		self::id => [
			'type' => 'mediumint',
			'null' => 'NO',
			'length' => '7',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::payedorfree => [
			'type' => 'varchar',
			'null' => 'YES',
			'length' => '6',
			'type_extra' => '',
			'default' => '',
		],
		self::buyorsell => [
			'type' => 'tinyint',
			'null' => 'NO',
			'length' => '1',
			'type_extra' => '',
			'default' => '1',
		],
		self::vehicleprice => [
			'type' => 'mediumint',
			'null' => 'YES',
			'length' => '7',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::currency => [
			'type' => 'enum',
			'null' => 'NO',
			'enum' => array('arm','usd','eur','rub'),
			'type_extra' => '',
			'default' => 'usd',
		],
		self::account_id => [
			'type' => 'mediumint',
			'null' => 'NO',
			'length' => '7',
			'type_extra' => '',
			'default' => '',
		],
		self::car_id => [
			'type' => 'int',
			'null' => 'NO',
			'length' => '8',
			'type_extra' => '',
			'default' => '',
		],
		self::datecreated => [
			'type' => 'char',
			'null' => 'NO',
			'length' => '8',
			'type_extra' => '',
			'default' => '',
		],
		self::description => [
			'type' => 'varchar',
			'null' => 'YES',
			'length' => '1024',
			'type_extra' => '',
			'default' => '',
		],
		self::country => [
			'type' => 'tinyint',
			'null' => 'NO',
			'length' => '3',
			'type_extra' => '',
			'default' => '',
		],
		self::state => [
			'type' => 'varchar',
			'null' => 'NO',
			'length' => '70',
			'type_extra' => '',
			'default' => '',
		],
		self::cityorprovince => [
			'type' => 'varchar',
			'null' => 'NO',
			'length' => '70',
			'type_extra' => '',
			'default' => '',
		],
		self::mainaddress => [
			'type' => 'varchar',
			'null' => 'NO',
			'length' => '384',
			'type_extra' => '',
			'default' => '',
		],
		self::altaddress => [
			'type' => 'varchar',
			'null' => 'YES',
			'length' => '384',
			'type_extra' => '',
			'default' => '',
		],
	];

	// mediumint(7) unsigned
	protected $id;

	// varchar(6)
	protected $payedorfree;

	// tinyint(1)
	protected $buyorsell;

	// mediumint(7) unsigned
	protected $vehicleprice;

	// enum('arm','usd','eur','rub')
	protected $currency;

	// mediumint(7)
	protected $account_id;

	// int(8)
	protected $car_id;

	// char(8)
	protected $datecreated;

	// varchar(1024)
	protected $description;

	// tinyint(3)
	protected $country;

	// varchar(70)
	protected $state;

	// varchar(70)
	protected $cityorprovince;

	// varchar(384)
	protected $mainaddress;

	// varchar(384)
	protected $altaddress;

	function __construct(array $modelData = []) {
		parent::__construct(self::MODEL, $modelData);
	}
}
?>