<?php

class FinalSettings extends SettingsClass {

	const MapKey = 'googlemapkey';
	const db1 = 'db1';

	function __construct() {
		$settings = [
			self::MapKey => 'AIzaSyBlOZ_t3-7-EvtAuBGG2rPMVNmP2xeAfIw',
			SettingsClass::TemplateFile => 'default.phtml',
			SettingsClass::Errorpage => 'error.php',
			SettingsClass::PageFileExt => 'php',
			SettingsClass::Homepage => 'home',
			// SettingsClass::DefaultAction => '',
			SettingsClass::Timezone => 'Asia/Yerevan',
			SettingsClass::SnippetsModule => true,
			SettingsClass::Globals_ => true,
			SettingsClass::PreLoad => 'preload.php',
			SettingsClass::PostLoad => 'postload.php',
			SettingsClass::SessionModule => new ArrayClass([
				// 'id' => md5 ('HracheToomasyan'),
				'start_options' => ['cookie_lifetime' => 7200]
			]),
			SettingsClass::LanguageModule => true,
			SettingsClass::DatabaseModule => false,
			SettingsClass::DefaultLang => 'en-uk',
			SettingsClass::LangFileExt => 'lang.php',
		];

		$settings = new ArrayClass($settings);

		// Uncomment if you're database using in your project
		$settings->add(SettingsClass::DatabaseModule, new ArrayClass([
			self::db1 => [
				SettingsClass::DBUSER => 'acs_limited_user',
				SettingsClass::DBPASSWORD => 'j1HIXERipiW2',
				SettingsClass::DBHOST => '127.0.0.1',
				SettingsClass::DBPORT => '3306',
				SettingsClass::DBNAME => 'acs_database',
				SettingsClass::DBCHARSET => 'UTF8',
				SettingsClass::DBTYPE => DatabaseClass::MYSQL,
			]
		]));

		/**
		 * Set the default database
		 */
		$settings->add(SettingsClass::DefaultDatabase, self::db1);

		parent::__construct($settings);
		error_reporting(E_ALL);
		ini_set('max_file_uploads', 7);
		ini_set('upload_max_filesize', '420K');
	}

}

?>