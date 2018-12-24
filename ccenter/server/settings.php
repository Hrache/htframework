<?php
final class FinalSettings extends SettingsClass
{
	const db1 = 'td_database';
	const db2 = 'acs_database';

	function __construct()
	{
		$settings = new ArrayClass([
			SettingsClass::Errorpage => 'error.php',
			SettingsClass::Homepage => 'home',
			SettingsClass::PagefileExt => 'php',
			SettingsClass::DefaultAction => 'welcome',
			SettingsClass::HandleGlobals => true,
			SettingsClass::DefaultLink => dirname($_SERVER['PHP_SELF']).'/?'.CustomLinkClass::newLink('home', 'welcome'),
			SettingsClass::LinkClass => 'ShortLinkClass', // 'ShortLinkClass', ...
			SettingsClass::TemplateFile => 'default.phtml', // 'default.phtml'
			SettingsClass::Timezone => 'Asia/Yerevan',
			SettingsClass::SnippetsModule => true,
			SettingsClass::DatabaseModule => false,
			// SettingsClass::DefaultDatabase => self::db1,
			SettingsClass::PreLoad => 'preload.php',
			SettingsClass::PostLoad => 'postload.php',
			SettingsClass::SessionModule => new ArrayClass([
				//'id' => md5(____SOME_TEXT_OR_NUMERIC_DATA____),
				'start_options' => [
					'cookie_lifetime' => 72000,
				],
			]),
		]);

		/**
			* Uncomment if you're going to use database features
			* @setting string Folder name of the default language where language related files are stored
			*/
		$settings->add(SettingsClass::DatabaseModule, false);

		/**
			* @setting boolean Indicates whether language functionality is active or no
			*/
		$settings->add(SettingsClass::LanguageModule, true);

		/**
			* @setting string The language file extension in case if you're going to change
			*/
		$settings->add(SettingsClass::LangFileExt, 'lang.php');

		/**
			* @setting string Folder name of the default language where language related files are stored
			*/
		$settings->add(SettingsClass::DefaultLang, 'en-uk');

		parent::__construct($settings);
		// ini_set ('max_file_uploads', 7);
		// ini_set ('upload_max_filesize', '420K');
	}
}
?>