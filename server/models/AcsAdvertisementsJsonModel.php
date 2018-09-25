<?php
class AcsAdvertisementsJsonModel extends MySQLModelAbstract
{
	use ModelsTrait;
	const MODEL = 'acs_advertisements_json';
	const id = 'id';
	const accountid = 'accountid';
	const advtype = 'advtype';
	const buyorsell = 'buyorsell';
	const vehicletype = 'vehicletype';
	const measure = 'measure';
	const distance = 'distance';
	const carbrand = 'carbrand';
	const carmodel = 'carmodel';
	const carmodelman = 'carmodelman';
	const carcondition = 'carcondition';
	const bodytype = 'bodytype';
	const carprice = 'carprice';
	const currency = 'currency';
	const releaseyear = 'releaseyear';
	const country = 'country';
	const state = 'state';
	const cityorprovince = 'cityorprovince';
	const mainaddress = 'mainaddress';
	const additional = 'additional';
	const rules = [
		self::id => [
			'type' => 'mediumint',
			'null' => 'NO',
			'length' => '7',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::accountid => [
			'type' => 'mediumint',
			'null' => 'NO',
			'length' => '7',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::advtype => [
			'type' => 'enum',
			'null' => 'NO',
			'enum' => array('spec','quick','free'),
			'type_extra' => '',
			'default' => 'free',
		],
		self::buyorsell => [
			'type' => 'enum',
			'null' => 'NO',
			'enum' => array('buy','sell'),
			'type_extra' => '',
			'default' => 'sell',
		],
		self::vehicletype => [
			'type' => 'enum',
			'null' => 'NO',
			'enum' => array('car'),
			'type_extra' => '',
			'default' => 'car',
		],
		self::measure => [
			'type' => 'enum',
			'null' => 'NO',
			'enum' => array('met','imp'),
			'type_extra' => '',
			'default' => 'met',
		],
		self::distance => [
			'type' => 'char',
			'null' => 'NO',
			'length' => '7',
			'type_extra' => '',
			'default' => '',
		],
		self::carbrand => [
			'type' => 'smallint',
			'null' => 'NO',
			'length' => '3',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::carmodel => [
			'type' => 'smallint',
			'null' => 'NO',
			'length' => '3',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::carmodelman => [
			'type' => 'varchar',
			'null' => 'YES',
			'length' => '70',
			'type_extra' => '',
			'default' => '',
		],
		self::carcondition => [
			'type' => 'enum',
			'null' => 'NO',
			'enum' => array('used','new','normal','bad','other'),
			'type_extra' => '',
			'default' => 'used',
		],
		self::bodytype => [
			'type' => 'enum',
			'null' => 'NO',
			'enum' => array('coupe','roadster','hatchback','pickup','combi','mpv','wagon','sedan','suv','convertible','vanminivan','truck'),
			'type_extra' => '',
			'default' => 'sedan',
		],
		self::carprice => [
			'type' => 'char',
			'null' => 'NO',
			'length' => '9',
			'type_extra' => '',
			'default' => '',
		],
		self::currency => [
			'type' => 'char',
			'null' => 'NO',
			'length' => '5',
			'type_extra' => '',
			'default' => '---',
		],
		self::releaseyear => [
			'type' => 'year',
			'null' => 'NO',
			'length' => '4',
			'type_extra' => '',
			'default' => '',
		],
		self::country => [
			'type' => 'tinyint',
			'null' => 'NO',
			'length' => '3',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::state => [
			'type' => 'varchar',
			'null' => 'NO',
			'length' => '255',
			'type_extra' => '',
			'default' => '',
		],
		self::cityorprovince => [
			'type' => 'varchar',
			'null' => 'NO',
			'length' => '255',
			'type_extra' => '',
			'default' => '',
		],
		self::mainaddress => [
			'type' => 'varchar',
			'null' => 'NO',
			'length' => '255',
			'type_extra' => '',
			'default' => '',
		],
		self::additional => [
			'type' => 'varchar',
			'null' => 'NO',
			'length' => '3400',
			'type_extra' => '',
			'default' => '',
		],
	];

	// mediumint(7) unsigned
	protected $id;

	// mediumint(7) unsigned
	protected $accountid;

	// enum('spec','quick','free')
	protected $advtype;

	// enum('buy','sell')
	protected $buyorsell;

	// enum('car')
	protected $vehicletype;

	// enum('met','imp')
	protected $measure;

	// char(7)
	protected $distance;

	// smallint(3) unsigned
	protected $carbrand;

	// smallint(3) unsigned
	protected $carmodel;

	// varchar(70)
	protected $carmodelman;

	// enum('used','new','normal','bad','other')
	protected $carcondition;

	// enum('coupe','roadster','hatchback','pickup','combi','mpv','wagon','sedan','suv','convertible','vanminivan','truck')
	protected $bodytype;

	// char(9)
	protected $carprice;

	// char(5)
	protected $currency;

	// year(4)
	protected $releaseyear;

	// tinyint(3) unsigned
	protected $country;

	// varchar(255)
	protected $state;

	// varchar(255)
	protected $cityorprovince;

	// varchar(255)
	protected $mainaddress;

	// varchar(3400)
	protected $additional;

	function __construct(array $modelData = [])
	{
		parent::__construct(self::MODEL, $modelData);
	}
}
?>
