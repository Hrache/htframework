<?php
class FinalSettings extends SettingsClass {
	const MapKey = 'googlemapkey';
	const db1 = 'db1';

	function __construct() {
		$settings = [
			self::MapKey => 'AIzaSyBlOZ_t3-7-EvtAuBGG2rPMVNmP2xeAfIw',
			SettingsClass::TemplateFile => 'default.phtml',
			SettingsClass::Errorpage => 'error.php',
			SettingsClass::PagefileExt => 'php',
			SettingsClass::Homepage => 'home',
			SettingsClass::HandleGlobals => true,
			SettingsClass::DefaultAction => '',
			SettingsClass::Timezone => 'Asia/Yerevan',
			SettingsClass::SnippetsModule => true,
			SettingsClass::DefaultLink => dirname($_SERVER['PHP_SELF']).'/?'.CustomLinkClass::newLink('home', 'welcome'),
			SettingsClass::PreLoad => 'preload.php',
			SettingsClass::PostLoad => 'postload.php',
			SettingsClass::SessionModule => new arrayc([
				// 'id' => md5 ('HracheToomasyan'),
				'start_options' => ['cookie_lifetime' => 7200]
			]),
			SettingsClass::LanguageModule => true,
			SettingsClass::DatabaseModule => false,
			SettingsClass::DefaultLang => 'en-uk',
			SettingsClass::LangFileExt => 'lang.php',
		];
		$settings = new arrayc($settings);

		// Uncomment if you're using database in your project
		$settings->add(
			SettingsClass::DatabaseModule, new arrayc([
				self::db1 => new arrayc([
					DatabaseClass::DBUSER => 'hrache_admin',
					DatabaseClass::DBPASS => '1111',
					DatabaseClass::SERVER => '192.168.6.133',
					DatabaseClass::PORT => '52485',
					DatabaseClass::DATABASE => 'hrache_framework',
					DatabaseClass::VENDOR => DatabaseClass::VENDOR_MSSQL
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