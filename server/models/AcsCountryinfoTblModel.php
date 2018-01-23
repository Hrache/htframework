<?php
class AcsCountryinfoTblModel extends MySQLModelAbstract   {
 const MODEL = 'acs_countryinfo_tbl';
 
 const id = 'id';
 const iso = 'iso';
 const name = 'name';
 const nicename = 'nicename';
 const iso3 = 'iso3';
 const numcode = 'numcode';
 const phonecode = 'phonecode';

 const rules = [
  self::id => [
   'type' => 'smallint',
   'null' => 'NO',
   'length' => '6',
   'type_extra' => '',
   'default' => '',
 ],
  self::iso => [
   'type' => 'char',
   'null' => 'NO',
   'length' => '2',
   'type_extra' => '',
   'default' => '',
 ],
  self::name => [
   'type' => 'varchar',
   'null' => 'NO',
   'length' => '80',
   'type_extra' => '',
   'default' => '',
 ],
  self::nicename => [
   'type' => 'varchar',
   'null' => 'NO',
   'length' => '80',
   'type_extra' => '',
   'default' => '',
 ],
  self::iso3 => [
   'type' => 'char',
   'null' => 'YES',
   'length' => '3',
   'type_extra' => '',
   'default' => '',
 ],
  self::numcode => [
   'type' => 'smallint',
   'null' => 'YES',
   'length' => '6',
   'type_extra' => '',
   'default' => '',
 ],
  self::phonecode => [
   'type' => 'int',
   'null' => 'NO',
   'length' => '5',
   'type_extra' => '',
   'default' => '',
 ],
];

 // smallint(6)
 protected $id;

 // char(2)
 protected $iso;

 // varchar(80)
 protected $name;

 // varchar(80)
 protected $nicename;

 // char(3)
 protected $iso3;

 // smallint(6)
 protected $numcode;

 // int(5)
 protected $phonecode;

 function __construct ( array $modelData = []) {
  parent::__construct ( self::MODEL, $modelData);
 }
}
?>