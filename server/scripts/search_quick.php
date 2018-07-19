<?php
$request = __('request');
$database = __('database');
$account_sql = 'SELECT * FROM `' . AccountModel::MODEL . '` WHERE `' . AccountModel::MODEL . '`.`id` = (SELECT `' . AcsAdvertisementsJsonModel::MODEL . '`.`id` FROM `' . CarsModel::MODEL . '` WHERE ';
$finalQuery = false;
if (get_('carbrand') != '') {
 $brand = 'SELECT `' . CarBrandsModel::MODEL . '`.`id` FROM `' . CarBrandsModel::MODEL . '` WHERE `' . CarBrandsModel::MODEL . "`.`title` = '".get_('carbrand')."';";
 $database->query($brand);
 unset($brand);
 if ($database->getResult()->rowCount() == 1) {
  $brand_id = $database->getResult()->fetch() [0];
  $account_sql .= "`" . CarBrandsModel::MODEL . "`.`id`=" . $brand_id;
  $finalQuery = true;
 }
}
if (get_('carmodel') != '') {
 $model = "SELECT `id` FROM `" . CarModelsModel::MODEL . "` WHERE `" . CarModelsModel::MODEL . "`.`title`='" . get_('carmodel') . "';";
 $database->query($model);
 $model_id = 0;
 if ($database->getResult()->rowCount() == 1) {
  $model_id = $database->getResult()->fetch() [0];
  if ($finalQuery) {
   $account_sql .= " AND ";
  }
  $account_sql .= "`" . CarsModel::MODEL . "`.`model_id` = " . $model_id;
  $finalQuery = true;
 }
}
if (get_('carbodytype') != '') {
 if ($finalQuery) {
  $account_sql .= " AND ";
 }
 $account_sql .= "`" . CarsModel::MODEL . "`.`bodytype` = '" . get_('carbodytype') . "'";
 $finalQuery = true;
}
if (get_("caryearfrom") != '') {
 if (get_('caryearto') != '') {
  if ($finalQuery) {
   $account_sql .= " AND ";
  }
  $account_sql .= "`" . CarsModel::MODEL . "`.`car_release_year` <= " . get_('caryearto');
  $finalQuery = true;
 }
}
if (get_('neworused') != '') {
 if ($finalQuery) {
  $account_sql .= " AND ";
 }
 $account_sql .= "`" . CarsModel::MODEL . "`.`carcondition` = '" . ((get_('carcondition') == 'new') ? 'n' : 'u') . "'";
 $finalQuery = true;
}
if (get_('carprice') != '') {
 if ($finalQuery) {
  $account_sql .= " AND ";
 }
 $account_sql .= "`" . CarsModel::MODEL . "`.`car_price` = '" . get_('carprice') . "'";
}
if ($finalQuery) {
 $account_sql .= ");";
 return ($account_sql);
} else {
 return ('');
}