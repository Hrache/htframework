<?php
class AccountAcsModel extends MySQLModelAbstract   {
	use ModelsTrait;
	const MODEL = 'account_acs';
	const id = 'id';
	const email = 'email';
	const full_name = 'full_name';
	const password = 'password';
	const birthday = 'birthday';
	const id_phonecode = 'id_phonecode';
	const phonenumber = 'phonenumber';
	const reg_date = 'reg_date';
	const last_visit = 'last_visit';
	const rules = [
		self::id => [
			'type' => 'mediumint',
			'null' => 'NO',
			'length' => '7',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::email => [
			'type' => 'char',
			'null' => 'NO',
			'length' => '255',
			'type_extra' => '',
			'default' => '',
		],
		self::full_name => [
			'type' => 'char',
			'null' => 'NO',
			'length' => '255',
			'type_extra' => '',
			'default' => '',
		],
		self::password => [
			'type' => 'char',
			'null' => 'NO',
			'length' => '64',
			'type_extra' => '',
			'default' => '',
		],
		self::birthday => [
			'type' => 'date',
			'null' => 'NO',
			'type_extra' => '',
			'default' => '',
		],
		self::id_phonecode => [
			'type' => 'tinyint',
			'null' => 'YES',
			'length' => '3',
			'type_extra' => 'unsigned',
			'default' => '',
		],
		self::phonenumber => [
			'type' => 'char',
			'null' => 'NO',
			'length' => '25',
			'type_extra' => '',
			'default' => '',
		],
		self::reg_date => [
			'type' => 'datetime',
			'null' => 'NO',
			'type_extra' => '',
			'default' => '',
		],
		self::last_visit => [
			'type' => 'datetime',
			'null' => 'NO',
			'type_extra' => '',
			'default' => '',
		],
	];

	// mediumint(7) unsigned
	protected $id;

	// char(255)
	protected $email;

	// char(255)
	protected $full_name;

	// char(64)
	protected $password;

	// date
	protected $birthday;

	// tinyint(3) unsigned
	protected $id_phonecode;

	// char(25)
	protected $phonenumber;

	// datetime
	protected $reg_date;

	// datetime
	protected $last_visit;

	function __construct(array $modelData = []) {
		parent::__construct(self::MODEL, $modelData);
	}
}
?>