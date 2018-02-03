<?php

class FinalSettings extends SettingsClass {

 const MapKey = 'googlemapkey';

 function __construct() {
  $settings = [
      self::MapKey => 'AIzaSyBlOZ_t3-7-EvtAuBGG2rPMVNmP2xeAfIw',
      SettingsClass::TemplateFile => 'default.phtml',
      SettingsClass::Errorpage => 'error.php',
      SettingsClass::PageFileExt => 'php',
      SettingsClass::Homepage => 'home',
      SettingsClass::Timezone => 'Asia/Yerevan',
      SettingsClass::SnippetsModule => true,
      SettingsClass::Globals_ => true,
      SettingsClass::DatabaseModule => false,
      SettingsClass::PreLoad => 'preload.php',
      SettingsClass::PostLoad => 'postload.php',
      SettingsClass::SessionModule => new ArrayClass([
          // 'id' => md5 ('HracheToomasyan'),
          'start_options' => ['cookie_lifetime' => 7200]]),
      SettingsClass::LanguageModule => true,
      SettingsClass::DefaultLang => 'en-uk',
      SettingsClass::LangFileExt => 'lang.php',];

  $settings = new ArrayClass($settings);

  // Uncomment if you're database using in your project
  $settings->add(SettingsClass::DatabaseModule, new ArrayClass([
      SettingsClass::DBUSER => 'acs_limited_user',
      SettingsClass::DBPASSWORD => 'j1HIXERipiW2',
      SettingsClass::DBHOST => '127.0.0.1',
      SettingsClass::DBPORT => '3306',
      SettingsClass::DBNAME => 'acs_database',
      SettingsClass::DBCHARSET => 'UTF8',
      SettingsClass::DBTYPE => DatabaseClass::MYSQL,]));

  parent::__construct($settings);
  error_reporting(E_ALL);
  ini_set('max_file_uploads', 7);
  ini_set('upload_max_filesize', '420K');
 }

}

?>