<?php
class CarModelsModel extends MySQLModelAbstract {
 const MODEL = 'acs_carmodels_tbl';

 const id = 'id';
 const brand_id = 'brand_id';
 const title = 'title';

 protected $rules = [
  'id' => [
   'type' => 'smallint',
   'length' => '4',
   'type_extra' => 'unsigned',
  ],
  'brand_id' => [
   'type' => 'smallint',
   'length' => '6',
   'type_extra' => 'unsigned',
  ],
  'title' => [
   'type' => 'varchar',
   'length' => '255',
   'type_extra' => '',
  ],
 ];

 // smallint(4) unsigned
 protected $id;

 // smallint(6) unsigned
 protected $brand_id;

 // varchar(255)
 protected $title;

 function __construct ( array $carModelsData = []) {
  parent::__construct ( self::MODEL, $carModelsData);
 }

 function getId() {
  return $this->id;
 }

 function getBrandId() {
  return $this->brandId;
 }

 function getTitle() {
  return $this->title;
 }

 function setId ( $id): CarModelsModel {
  $this->id = $id;
  return $this;
 }

 function setBrandId ( $brandId): CarModelsModel {
  $this->brandId = $brandId;
  return $this;
 }

 function setTitle ( $title): CarModelsModel {
  $this->title = $title;
  return $this;
 }
}
?>