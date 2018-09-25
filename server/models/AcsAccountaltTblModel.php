<?php
class AcsAccountaltTblModel extends MySQLModelAbstract
{
	use ModelsTrait;
	const MODEL = 'acs_accountalt_tbl';
	const account_id = 'account_id';
	const nickname = 'nickname';
	const company = 'company';
	const arlternativeemail = 'arlternativeemail';
	const internationalphone = 'internationalphone';
	const country = 'country';
	const country_state = 'country_state';
	const city = 'city';
	const zippostalcode = 'zippostalcode';
	const streetaddress = 'streetaddress';
	const houseappartment = 'houseappartment';
	const skype = 'skype';
	const msn = 'msn';
	const icq = 'icq';
	const aim = 'aim';
	const yim = 'yim';
	const facebook = 'facebook';
	const google = 'google';
	const rules = [
		self::account_id => [
			'type' => 'mediumint',
			'null' => 'YES',
			'length' => '7',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::nickname => [
			'type' => 'varchar',
			'null' => 'YES',
			'length' => '25',
			'type_extra' => '',
			'default' => '',
		],
		self::company => [
			'type' => 'varchar',
			'null' => 'YES',
			'length' => '255',
			'type_extra' => '',
			'default' => '',
		],
		self::arlternativeemail => [
			'type' => 'varchar',
			'null' => 'YES',
			'length' => '40',
			'type_extra' => '',
			'default' => '',
		],
		self::internationalphone => [
			'type' => 'varchar',
			'null' => 'YES',
			'length' => '30',
			'type_extra' => '',
			'default' => '',
		],
		self::country => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '4',
			'type_extra' => '',
			'default' => '',
		],
		self::country_state => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '4',
			'type_extra' => '',
			'default' => '',
		],
		self::city => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '4',
			'type_extra' => '',
			'default' => '',
		],
		self::zippostalcode => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '4',
			'type_extra' => '',
			'default' => '',
		],
		self::streetaddress => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '4',
			'type_extra' => '',
			'default' => '',
		],
		self::houseappartment => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '4',
			'type_extra' => '',
			'default' => '',
		],
		self::skype => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '4',
			'type_extra' => '',
			'default' => '',
		],
		self::msn => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '4',
			'type_extra' => '',
			'default' => '',
		],
		self::icq => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '4',
			'type_extra' => '',
			'default' => '',
		],
		self::aim => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '4',
			'type_extra' => '',
			'default' => '',
		],
		self::yim => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '4',
			'type_extra' => '',
			'default' => '',
		],
		self::facebook => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '4',
			'type_extra' => '',
			'default' => '',
		],
		self::google => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '4',
			'type_extra' => '',
			'default' => '',
		],
	];

	// mediumint(7) unsigned
	protected $account_id;

	// varchar(25)
	protected $nickname;

	// varchar(255)
	protected $company;

	// varchar(40)
	protected $arlternativeemail;

	// varchar(30)
	protected $internationalphone;

	// tinyint(4)
	protected $country;

	// tinyint(4)
	protected $country_state;

	// tinyint(4)
	protected $city;

	// tinyint(4)
	protected $zippostalcode;

	// tinyint(4)
	protected $streetaddress;

	// tinyint(4)
	protected $houseappartment;

	// tinyint(4)
	protected $skype;

	// tinyint(4)
	protected $msn;

	// tinyint(4)
	protected $icq;

	// tinyint(4)
	protected $aim;

	// tinyint(4)
	protected $yim;

	// tinyint(4)
	protected $facebook;

	// tinyint(4)
	protected $google;

	function __construct(array $modelData = []) {
		parent::__construct(self::MODEL, $modelData);
	}
}
?>