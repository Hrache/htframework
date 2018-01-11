<?php
class CountriesModel extends MySQLModelAbstract {
 const MODEL = "acs_countries_tbl";

 const id = 'id';
 const title = 'title';

 protected $id;
 protected $title;

 function __construct ( Array $country) {
  parent::__construct ( self::MODEL, $country);
 }

 function getId(): string {
  return $this->id;
 }

 function getTitle(): string {
  return $this->title;
 }
}
?>