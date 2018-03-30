<?php
class AcsAccountTblModel extends MySQLModelAbstract {
	use ModelsTrait;
	const MODEL = 'acs_account_tbl';
	const id = 'id';
	const email = 'email';
	const password = 'password';
	const name = 'name';
	const surname = 'surname';
	const birthday = 'birthday';
	const gender = 'gender';
	const country_id = 'country_id';
	const phonenumber = 'phonenumber';
	const signupdate = 'signupdate';
	const lastvisit = 'lastvisit';
	const rules = [
		self::id => [
			'type' => 'mediumint',
			'null' => 'NO',
			'length' => '7',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::email => [
			'type' => 'varchar',
			'null' => 'NO',
			'length' => '128',
			'type_extra' => '',
			'default' => '',
		],
		self::password => [
			'type' => 'varchar',
			'null' => 'NO',
			'length' => '32',
			'type_extra' => '',
			'default' => '',
		],
		self::name => [
			'type' => 'varchar',
			'null' => 'NO',
			'length' => '45',
			'type_extra' => '',
			'default' => '',
		],
		self::surname => [
			'type' => 'varchar',
			'null' => 'NO',
			'length' => '70',
			'type_extra' => '',
			'default' => '',
		],
		self::birthday => [
			'type' => 'date',
			'null' => 'NO',
			'type_extra' => '',
			'default' => '',
		],
		self::gender => [
			'type' => 'enum',
			'null' => 'NO',
			'enum' => array('m','w'),
			'type_extra' => '',
			'default' => 'm',
		],
		self::country_id => [
			'type' => 'tinyint',
			'null' => 'NO',
			'length' => '4',
			'type_extra' => '',
			'default' => '',
		],
		self::phonenumber => [
			'type' => 'varchar',
			'null' => 'NO',
			'length' => '30',
			'type_extra' => '',
			'default' => '',
		],
		self::signupdate => [
			'type' => 'datetime',
			'null' => 'NO',
			'type_extra' => '',
			'default' => 'CURRENT_TIMESTAMP',
		],
		self::lastvisit => [
			'type' => 'datetime',
			'null' => 'NO',
			'type_extra' => '',
			'default' => 'CURRENT_TIMESTAMP',
		],
	];

	// mediumint(7) unsigned
	protected $id;

	// varchar(128)
	protected $email;

	// varchar(32)
	protected $password;

	// varchar(45)
	protected $name;

	// varchar(70)
	protected $surname;

	// date
	protected $birthday;

	// enum('m','w')
	protected $gender;

	// tinyint(4)
	protected $country_id;

	// varchar(30)
	protected $phonenumber;

	// datetime
	protected $signupdate;

	// datetime
	protected $lastvisit;

	function __construct(array $modelData = []) {
		parent::__construct(self::MODEL, $modelData);
	}

	/**
	 *
	 */
	static function addNewAccount(ArrayClass $newAccountInfo) {
		return sprintf('');
	}
}
?>