<?php
class FinalSettings extends SettingsClass {
 const MAPKEY = 'googlemapkey';

 function __construct() {
  $settings = new ArrayClass ([
   self::MAPKEY                => 'AIzaSyBlOZ_t3-7-EvtAuBGG2rPMVNmP2xeAfIw',
   SettingsClass::TEMPLATEFILE => 'default.phtml',
   SettingsClass::ERRORPAGE    => 'error.php',
   SettingsClass::PageExt      => 'php',
   SettingsClass::HOMEPAGE     => 'home',
   SettingsClass::TIMEZONE     => 'Asia/Yerevan',
   SettingsClass::SNIPPETS     => true,
   SettingsClass::GLOBALS      => true,
   SettingsClass::DATABASE     => false,
   SettingsClass::SESSION      => new ArrayClass ([
    // 'id' => md5 ('HrachToomasyan'),
    'start_options' => ['cookie_lifetime' => 7200]]),
   SettingsClass::LANGUAGE     => true,
   SettingsClass::DEFAULTLANG  => 'en-uk',
   SettingsClass::LANGEXT      => 'lang.php',]);

  /* Uncomment if you're database using in your project */
  $settings->add (SettingsClass::DATABASE, new ArrayClass ([
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