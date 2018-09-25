<?php
class FinalSettings extends SettingsClass
{
	const MapKey = 'googlemapkey';
	const db1 = 'db1';

	function __construct()
	{
		$settings =
		[
			self::MapKey => 'AIzaSyBlOZ_t3-7-EvtAuBGG2rPMVNmP2xeAfIw',
			SettingsClass::TemplateFile => 'default.phtml',
			SettingsClass::Errorpage => 'error.php',
			SettingsClass::PagefileExt => 'php',
			SettingsClass::Homepage => 'home',
			SettingsClass::HandleGlobals => true,
			// SettingsClass::DefaultAction => '',
			SettingsClass::Timezone => 'Asia/Yerevan',
			SettingsClass::SnippetsModule => true,
			SettingsClass::DefaultLink => dirname($_SERVER['PHP_SELF']).'/?'.CustomLinkClass::newLink('home', 'welcome'),
			SettingsClass::PreLoad => 'preload.php',
			SettingsClass::PostLoad => 'postload.php',
			SettingsClass::SessionModule => new ArrayClass(
			[
				// 'id' => md5 ('HracheToomasyan'),
				'start_options' => ['cookie_lifetime' => 7200]
			]),
			SettingsClass::LanguageModule => true,
			SettingsClass::DatabaseModule => false,
			SettingsClass::DefaultLang => 'en-uk',
			SettingsClass::LangFileExt => 'lang.php',
		];
		$settings = new ArrayClass($settings);

		$settings->add(SettingsClass::DatabaseModule, new ArrayClass(
		[
			// Uncomment if you're database using in your project
			self::db1 => new ArrayClass(
			[
				MySQLClass::DBUSER => 'acs_limited_user',
				MySQLClass::DBPASSWORD => 'j1HIXERipiW2',
				MySQLClass::DBHOST => '127.0.0.1',
				MySQLClass::DBPORT => '3306',
				MySQLClass::DBNAME => 'acs_database',
				MySQLClass::DBCHARSET => 'UTF8',
				DatabaseClass::DBTYPE => DatabaseClass::MYSQL,
			])
		]));

		$settings->add(SettingsClass::DefaultDatabase, self::db1);

		// Setting the default database
		parent::__construct($settings);

		error_reporting(E_ALL);

		ini_set('max_file_uploads', 7);

		ini_set('upload_max_filesize', '420K');
	}
}
?>