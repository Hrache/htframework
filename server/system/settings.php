<?php
class FinalSettings extends SettingsClass {
 const MAPKEY = 'googlemapkey';

 function __construct() {
  $settings = new ArrayClass ([
   self::MAPKEY                => 'AIzaSyBlOZ_t3-7-EvtAuBGG2rPMVNmP2xeAfIw',
   SettingsClass::TemplateFile => 'default.phtml',
   SettingsClass::Errorpage    => 'error.php',
   SettingsClass::PageExt      => 'php',
   SettingsClass::Homepage     => 'home',
   SettingsClass::Timezone     => 'Asia/Yerevan',
   SettingsClass::Snippets     => true,
   SettingsClass::Globals      => true,
   SettingsClass::Database     => false,
   SettingsClass::Session      => new ArrayClass ([
    // 'id' => md5 ('HracheToomasyan'),
    'start_options' => ['cookie_lifetime' => 7200]]),
   SettingsClass::Language     => true,
   SettingsClass::DefaultLang  => 'en-uk',
   SettingsClass::LangFileExt      => 'lang.php',]);

  /* Uncomment if you're database using in your project */
  $settings->add (SettingsClass::Database, new ArrayClass ([
   SettingsClass::DBUSER     => 'acs_limited_user',
   SettingsClass::DBPASSWORD => 'j1HIXERipiW2',
   SettingsClass::DBHOST     => '127.0.0.1',
   SettingsClass::DBPORT     => '3306',
   SettingsClass::DBNAME     => 'acs_database',
   SettingsClass::DBCHARSET  => 'UTF8',
   SettingsClass::DBTYPE     => DatabaseClass::MYSQL,]));

  parent::__construct ($settings);
  error_reporting (E_ALL);
  ini_set ('max_file_uploads', 7);
  ini_set ('upload_max_filesize', '420K');
 }
}
?>