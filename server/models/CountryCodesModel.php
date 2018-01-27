<?php

class CountryCodesModel extends MySQLModelAbstract {

 const MODEL = 'acs_countrycodes_tbl';

 function __construct() {
  parent::__construct(self::MODEL);
 }

}

?>