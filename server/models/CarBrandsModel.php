<?php

class CarBrandsModel extends MySQLModelAbstract {

 const MODEL = 'acs_carbrands_tbl';
 const id = 'id';
 const title = 'title';

 protected $rules = [
     'id' => [
         'type' => 'smallint',
         'length' => '4',
         'type_extra' => 'unsigned',
     ],
     'title' => [
         'type' => 'varchar',
         'length' => '100',
         'type_extra' => '',
     ],
 ];
 // smallint(4) unsigned
 protected $id;
 // varchar(100)
 protected $title;

 function __construct(Array $carBrandData = []) {
  parent::__construct(self::MODEL, $carBrandData);
 }

 function getId() {
  return $this->id;
 }

 function getTitle() {
  return $this->title;
 }

 function setId($id): CarBrandsModel {
  $this->id = $id;
  return $this;
 }

 function setTitle($title): CarBrandsModel {
  $this->title = $title;
  return $this;
 }

 static function modelName() {
  return self::MODEL;
 }

}

?>