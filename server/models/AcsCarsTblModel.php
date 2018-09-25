<?php
class AcsCarsTblModel extends MySQLModelAbstract   {
	use ModelsTrait;
	const MODEL = 'acs_cars_tbl';
	const id = 'id';
	const distancedriven = 'distancedriven';
	const fueltype = 'fueltype';
	const transmission = 'transmission';
	const doors = 'doors';
	const bodytype = 'bodytype';
	const width = 'width';
	const height = 'height';
	const length = 'length';
	const _0to100kmhtime = '_0to100kmhtime';
	const _0to60mphtime = '_0to60mphtime';
	const displacement = 'displacement';
	const topspeed = 'topspeed';
	const power = 'power';
	const city_consumption = 'city_consumption';
	const highway_consumption = 'highway_consumption';
	const combined_consumption = 'combined_consumption';
	const fuel_consumption = 'fuel_consumption';
	const co2emissions = 'co2emissions';
	const engine_size = 'engine_size';
	const seatingcapacity = 'seatingcapacity';
	const transmission_shifts = 'transmission_shifts';
	const drivetype = 'drivetype';
	const tirewheelsize = 'tirewheelsize';
	const countryorigin_id = 'countryorigin_id';
	const countryassembly_id = 'countryassembly_id';
	const torque = 'torque';
	const curbweight = 'curbweight';
	const audio_totalnumberofspeakers = 'audio_totalnumberofspeakers';
	const extra_descriptors = 'extra_descriptors';
	const rules = [
		self::id => [
			'type' => 'int',
			'null' => 'NO',
			'length' => '8',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::distancedriven => [
			'type' => 'mediumint',
			'null' => 'NO',
			'length' => '7',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::fueltype => [
			'type' => 'enum',
			'null' => 'NO',
			'enum' => array('patrol','lpggas','diesel','biofuel'),
			'type_extra' => '',
			'default' => 'patrol',
		],
		self::transmission => [
			'type' => 'enum',
			'null' => 'NO',
			'enum' => array('auto','manual','semi-auto','cvt'),
			'type_extra' => '',
			'default' => 'manual',
		],
		self::doors => [
			'type' => 'enum',
			'null' => 'NO',
			'enum' => array('0','2','3','4','5'),
			'type_extra' => '',
			'default' => '4',
		],
		self::bodytype => [
			'type' => 'enum',
			'null' => 'NO',
			'enum' => array('coupe','roadster','hatchback','pickup','combi','mpv','wagon','sedan','suv','convertible','vanminivan','truck'),
			'type_extra' => '',
			'default' => 'sedan',
		],
		self::width => [
			'type' => 'smallint',
			'null' => 'YES',
			'length' => '5',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::height => [
			'type' => 'smallint',
			'null' => 'YES',
			'length' => '5',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::length => [
			'type' => 'smallint',
			'null' => 'YES',
			'length' => '5',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::_0to100kmhtime => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '2',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::_0to60mphtime => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '2',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::displacement => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '5',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::topspeed => [
			'type' => 'smallint',
			'null' => 'YES',
			'length' => '3',
			'type_extra' => '',
			'default' => '',
		],
		self::power => [
			'type' => 'smallint',
			'null' => 'NO',
			'length' => '4',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::city_consumption => [
			'type' => 'float',
			'null' => 'YES',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::highway_consumption => [
			'type' => 'float',
			'null' => 'YES',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::combined_consumption => [
			'type' => 'float',
			'null' => 'YES',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::fuel_consumption => [
			'type' => 'float',
			'null' => 'YES',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::co2emissions => [
			'type' => 'float',
			'null' => 'YES',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::engine_size => [
			'type' => 'float',
			'null' => 'NO',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::seatingcapacity => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '2',
			'type_extra' => 'unsigned',
			'default' => '4',
		],
		self::transmission_shifts => [
			'type' => 'tinyint',
			'null' => 'NO',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '5',
		],
		self::drivetype => [
			'type' => 'enum',
			'null' => 'YES',
			'enum' => array('awd','fwd','rwd','4wd'),
			'type_extra' => '',
			'default' => 'fwd',
		],
		self::tirewheelsize => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '1',
			'type_extra' => 'unsigned',
			'default' => '0',
		],
		self::countryorigin_id => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '3',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::countryassembly_id => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '3',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::torque => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '3',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::curbweight => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '3',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::audio_totalnumberofspeakers => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '2',
			'type_extra' => '',
			'default' => '',
		],
		self::extra_descriptors => [
			'type' => 'varchar',
			'null' => 'NO',
			'length' => '5000',
			'type_extra' => '',
			'default' => '',
		],
	];

	// int(8) unsigned
	protected $id;

	// mediumint(7) unsigned
	protected $distancedriven;

	// enum('patrol','lpggas','diesel','biofuel')
	protected $fueltype;

	// enum('auto','manual','semi-auto','cvt')
	protected $transmission;

	// enum('0','2','3','4','5')
	protected $doors;

	// enum('coupe','roadster','hatchback','pickup','combi','mpv','wagon','sedan','suv','convertible','vanminivan','truck')
	protected $bodytype;

	// smallint(5) unsigned
	protected $width;

	// smallint(5) unsigned
	protected $height;

	// smallint(5) unsigned
	protected $length;

	// tinyint(2) unsigned
	protected $_0to100kmhtime;

	// tinyint(2) unsigned
	protected $_0to60mphtime;

	// tinyint(5) unsigned
	protected $displacement;

	// smallint(3)
	protected $topspeed;

	// smallint(4) unsigned
	protected $power;

	// float unsigned
	protected $city_consumption;

	// float unsigned
	protected $highway_consumption;

	// float unsigned
	protected $combined_consumption;

	// float unsigned
	protected $fuel_consumption;

	// float unsigned
	protected $co2emissions;

	// float unsigned
	protected $engine_size;

	// tinyint(2) unsigned
	protected $seatingcapacity;

	// tinyint(1) unsigned
	protected $transmission_shifts;

	// enum('awd','fwd','rwd','4wd')
	protected $drivetype;

	// tinyint(1) unsigned
	protected $tirewheelsize;

	// tinyint(3) unsigned
	protected $countryorigin_id;

	// tinyint(3) unsigned
	protected $countryassembly_id;

	// tinyint(3) unsigned
	protected $torque;

	// tinyint(3) unsigned
	protected $curbweight;

	// tinyint(2)
	protected $audio_totalnumberofspeakers;

	// varchar(5000)
	protected $extra_descriptors;

	function __construct(array $modelData = []) {
		parent::__construct(self::MODEL, $modelData);
	}
}
?>