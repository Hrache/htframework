<?php

/*
 * Description: function returns word from vocabolary
 * @param string or int - index of the word in vocabolary
 * @return string
 */

function _abc($index) {
 return (is_numeric($index)) ? $index : __('language')->getWord($index);
}

/**
 * Description of _redStar
 * prints out the html text red star as a sign of importance
 *
 * @return void
 * */
function _redStar() {
 echo ( "<b class='red-star'>*</b>");
}

/**
 * Description of post_ returns POST data by index
 * @param string or int - index of the POST data
 * @return mixed
 */
function post_($index) {
 return (__('request')->postItem($index));
}

/**
 * Description: function returns GET data by index
 * @param string or int - index of the GET data
 * @return mixed
 */
function get_($index) {
 return (__('request')->getItem($index));
}

/**
 * Description if checkedRadio
 * prints out the checked HTML attribute of HTML radio button
 * @param bool $condition should function print checked or no
 * @return string
 */
function checkedRadio(bool $condition): string {
 return (($condition) ? ' checked="checked"' : '');
}

/**
 * Description of checkedPost
 * if data was sent as a checked checkbox it will return
 * attribute checked on the next request of a same page or on error
 * @param index string - key of the posted data
 * @return string
 */
function checkedPost(string $index): string {
 return (boolval(post_($index))) ? 'checked="checked" ' : '';
}

function errorCondition(string $errorIndex): bool {
 return (boolval(__('errors')) && __('errors')->getSingleError($errorIndex)) ? true : false;
}

/**
 * Description of DOMOptions_Countries
 * @param array $fields - by default empty and the list of information
 *  0 - nicename ( name of the country)
 *  1 - iso
 *  2 - iso3
 *  3 - numcode
 *  4 - phonecode
 * @param $selected - the value of the selected option
 * @param $_empty - the first option is empty, but may contain text data
 * @return string
 */
function DOMOptions_PostalInfo($selected = false, $_empty = '', array $fields = [0, 4]): string {
 $info = PostalInfoCustom(-1, $fields);

 if ($info->isEmpty()) {
  return '';
 } else {
  lib_load('html');
  $_data = '';
 }

 while (!$info->isEmpty()) {
  $i = new ArrayClass((array) $info->pull()->value);
  $id = $i->grab(AcsCountryinfoTblModel::id)->value;
  $country = $i->grab(AcsCountryinfoTblModel::nicename)->value;
  $phonecode = $i->grab(AcsCountryinfoTblModel::phonecode)->value;
  $_data .= HTMLHelpers::DOMOption($id, implode(' ', [$country, $phonecode]));
 }

 unset($info);
 lib_unload('html');

 return trim($_data);
}

/**
 * Returns postal info in a user desired way
 * @param array $fields - By default empty and the list of information
 *  0 - nicename ( name of the country)
 *  1 - iso
 *  2 - iso3
 *  3 - numcode
 *  4 - phonecode
 * @param int $selected - By default -1
 * @param array $fields
 * @return ArrayClass Desired data by the given fields
 */
function PostalInfoCustom(int $selected = -1, array $fields = [0, 4]): ArrayClass {
 $fieldsArray = new ArrayClass([AcsCountryinfoTblModel::id]);

 while (boolval($fields)) {
  $field = array_shift($fields);

  switch (intval($field)) {
   case (0): {
     $fieldsArray->add(null, AcsCountryinfoTblModel::nicename);
     break;
    }
   case (1): {
     $fieldsArray->add(null, AcsCountryinfoTblModel::iso);
     break;
    }
   case (2): {
     $fieldsArray->add(null, AcsCountryinfoTblModel::iso3);
     break;
    }
   case (3): {
     $fieldsArray->add(null, AcsCountryinfoTblModel::numcode);
     break;
    }
   default: {
     $fieldsArray->add(null, AcsCountryinfoTblModel::phonecode);
    }
  }
 }

 $qry = '';

 if ($selected >= 0) {
  $arr = $fieldsArray->inputArray();

  array_walk_recursive($arr, function (&$val, $key) {
   $val = MySQLModelAbstract::_fier($val);
  });

  $fieldsArray->replaceArray($arr);
  unset($arr);
  $fields = implode(',', $fieldsArray->inputArray());
  $qry = sprintf('SELECT %s FROM %s WHERE `%s`=%s;', $fields, AcsCountryinfoTblModel::MODEL, AcsCountryinfoTblModel::id, $selected);
 } else {
  $qry = AcsCountryinfoTblModel::getByFields($fieldsArray, AcsCountryinfoTblModel::MODEL);
 }

 $info = __('database')->PDOFetchArray($qry, 1);
 unset($fieldsArray);
 return $info;
}

function DOMCountries($selected = false, $_empty = '') {
 return DOMOptions_PostalInfo($selected, $_empty, [0]);
}

/**
 * Description of currency list
 * @param $name DOM name of the form select-element
 * @param $selected value which will be selection criteria
 * @return string list of registered currencies from website's database
 * */
function ListOfCurrencies(string $name, $selected = 0): string {
 // reading currencies from database
 $currencies = __('database')->PDOFetchArray(AcsCurrencyModel::getAll(AcsCurrencyModel::MODEL), 1);

 // item of drop down list
 $items = '';

 // filling up the $items
 while (!$currencies->isEmpty()) {
  $item = $currencies->pull();

  if (!boolval($item)) {
   continue;
  }

  $items .= sprintf('<option value="%s"%s>%s</option>' . PHP_EOL, $item->value->id, ($item->value->id === $selected || $selected === 0) ? ' selected' : '', _abc($item->value->currency));
 }

 // variable that will keep HTML code of the list of currencies
 $list = sprintf('<select name="%s">%s</select>', $name, $items);
 return $list;
}

/**
 * Description of DOMOptions_CarBrands
 * @param $selected - the value of the selected option
 * @param $_empty - the first option is empty, but may contain text data
 * @return string
 */
function DOMOptions_CarBrands($selected = -1, string $_empty = ''): string {
 // CarBrandsModel
 $brands = __('database')->PDOFetchArray(CarBrandsModel::getAll(CarBrandsModel::MODEL), 1);
 $_carBrands = '';

 while (!$brands->isEmpty()) {
  $i = $brands->pull();

  if (!boolval($i->value)) {
   continue;
  }

  $_carBrands .= html_option(utf8_decode($i->value->title), $i->value->id, ($i->key == intval($selected) && ($selected != false || $selected != '')) ? true : false);
 }

 unset($brands);
 return trim($_carBrands);
}

/**
 * Description of DOMOptions_CarModelsByCarBrand
 *
 * @param integer $carBrand - the string representation of the car brand
 * @param $selected - the value of the selected option
 * @param $_empty - the 1st option is empty, but may contain text data
 * @return string
 */
function DOMOptions_CarModelsByCarBrand(int $carBrand = -1, $selected = false, $_empty = ''): string {
 // CarModelsModel
 $models = __('database')->PDOFetchArray(CarModelsModel::getByColumn(CarModelsModel::brand_id, $carBrand, CarModelsModel::MODEL), 1);
 $_carModels = '';

 while (!$models->isEmpty()) {
  $i = $models->pull();

  if (!is_object($i)) {
   continue;
  }

  $_carModels .= html_option($i->value->title, $i->value->id, (boolval($selected) && $i->value->id == $selected) ? true : false);
 }

 unset($models);
 return $_carModels;
}

/**
 * Description of formDataNames
 * @return string $requestArray
 */
function formDataNames(Array $requestArray): string {
 $keyList = '';

 foreach ($requestArray as $key => $val) {
  $keyList .= $key . PHP_EOL;
 }

 return $keyList;
}

/**
 * Description of html_nl
 * return html tag of the new line
 * @return string
 */
function html_nl(): string {
 return '<br/>';
}

;

/**
 * Description of dynPageTitle
 *
 *
 * */
function acs_PageTitle(string $text): void {
 __('page')->setTitle($text . ': ' . __('page')->getTitle());
}

/**
 * Description of createMenu
 * creates main of a kind menu around current project
 * @param array $menulinks [ 'pageindex' => [
 *  string       [getdata] get data for page,
 *  int | string [content] text-content of the anchor
 *  bool         [display] display the item or not
 *  string       [url]     unique url in case of exception
 * ]]
 *
 * @param array $attr [
 *  string [menu] menu wrapper class
 *  string [menu-item] menu item class
 *  string [id] menu wrapper
 *  string [active] class for active link
 *  string [page] the active page
 *  string [url] url of the page
 *  bool [vertical] decides weather menu is vertical ( true) or horizontal ( false)
 * ]
 */
function createmenu(array $menulinks, array $attr) {
 if (!isset($attr ["menu"])) {
  $attr ["menu"] = "";
 }

 if (!isset($attr ["id"])) {
  $attr ["id"] = "";
 }

 $items = '';

 foreach ($menulinks as $page => $link) {
  if (isset($link ['display']) && !boolval($link ['display'])) {
   continue;
  }

  if (!isset($attr ["menu-item"])) {
   $attr ["menu-item"] = '';
  }

  $itemClass = $attr ["menu-item"];

  if (isset($attr ['page']) && $page == $attr ['page']) {
   $itemClass .= (isset($attr ['active']) ? ' ' . $attr ['active'] : '');
  }

  if (!isset($link ["getdata"])) {
   $link ["getdata"] = "";
  } else {
   $link ["getdata"] = '&' . $link ["getdata"];
  }

  if (!isset($attr ["menu-item"])) {
   $attr ["menu-item"] = "";
  }

  if (!isset($link ["text"])) {
   $link ["text"] = '';
  }

  $items .= sprintf(PHP_EOL . '<a href="%s" class="%s">%s</a>%s', (isset($link ['url']) ? $link ['url'] : $attr ['url'] . $page . $link ["getdata"]), $itemClass, $link ["text"], (boolval($attr ['vertical']) ? '<br/>' : ''));
 }

 printf(PHP_EOL . '<span%s>%s</span>', boolval($attr ["menu"]) ? ' class="' . $attr ["menu"] . '"' : '', $items);
}

/**
 * The pathAndURL returns the array of file-system filepaths
 * and URLs of files of the given paths
 * @param string $path the path where files are stored
 * @param string $webDir web path without file (not web file path)
 * @return array file-system file-paths and URLs of the files in the directory
 * (use 'path', 'names' and 'url' to access corresponding information)
 */
function pathAndURL(string $path, string $webDir): array {
 $files = [
     'path' => $path,
     'url' => $webDir,
     'names' => scandir_c($path)];

 return $files;
}

/**
 * Generates HTML code within text
 * for form fields that need description
 * @param ArrayClass $keyVal
 * Some array of key-val pairs that will be returned
 * @param string $desclang
 * The translation of the word 'Description'
 * @return string
 */
function ffDesc(ArrayClass $keyVal, string $desclang = 'Description'): string {
 $divcss = implode(';', [
     'padding: 1px 4px 4px 4px', 'max-width: 90%',
     'font-size: 12px'
 ]);
 $desctext = [];

 while (!$keyVal->isEmpty()) {
  $i = $keyVal->pull();

  if (is_array($i->value)) {
   $i->value = implode(', ', $i->value);
  }

  $i->key = ucfirst($i->key);
  $desctext [$i->key] = $i->value;
 }

 return sprintf('<br/><span style="%s">%s: %s</span>', $divcss, ucfirst($desclang), implode(', ', $desctext));
}

?>