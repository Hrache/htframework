<?php

class PageClass implements PageInterface {

 private $required;
 private $additional;
 private $errors;
 private $pageNumber;

 public function __construct() {
  # $query = $account_advs = null;
  __('language')->append('advertisements');
  acs_PageTitle(_abc('pagetitle'));

  // advertisement.pagination
  # $this->pageNumber = intval (get_ ('pagenumber'));
  // properties
  #$this->required   = __('session')->getCookie ('required') ?? new ArrayClass();
  ##$this->required   = __('session')->getCookie ('required') ?? new ArrayClass();$this->additional = __('session')->getCookie ('additional') ?? new ArrayClass();
  #$this->errors     = __('session')->getCookie ('errors') ?? new ArrayClass();

  switch (__('request')->getAction()) {
   // advertisements.add
   case ('add'): {
     $this->add();
     break;
    }

   // advertisements.async_image_uploads
   case ('async_img_uploads'): {
     _di('images', __('request')->getFiles());
     $this->asyncUploadImgs();
     break;
    }

   // advertisements.edit
   case ('edit'): {
     $this->edit();
     break;
    }

   // advertisements.delete
   case ('delete'): {
     $this->delete();
     break;
    }
   default: {

    }
  }

  // pagination
  # $query = "SELECT * FROM `" . AcsAdvertisementsJsonModel::MODEL . "` WHERE `" . AcsAdvertisementsJsonModel::accountid . "`=" . __('account')->id . " LIMIT " . (10 * $this->pageNumber) . ";";
  # $account_advs = __('database')->PDOFetchArray ($query, -1);
  # unset ($query);
 }

 public function addRequired() {
  lib_load('validation');
 }

 /**
  * Description of add()
  * adds new advertisement into database for an online user
  * */
 public function add() {
  get_file('advertisements_add.php');
 }

 /**
  * Description of edit()
  * edits the existing advertisement by given data
  * */
 public function edit(int $id) {

 }

 /**
  * Description of delete()
  * removes the desired advertisement
  * */
 public function delete(int $id) {

 }

 public function asyncUploadImgs() {
  die(print_r(__('request')->getFiles(), true));
  get_file('img_upload.php');
 }

 function resources() {
  lib_load('html');
  echo HTMLHelpers::CSSLink('view/res/advs.css');
 }

 // advertisements._documentReady
 function jsDocReady() {
  get_file(Res . 'js' . ds . 'advs.inc.js');
 }

 // advertisements._content
 function content() {
  __('language')->append('common_forms', 'measures', 'newadvform', 'carinfo');
  __('page')->insertSnippet('account_advertisements');
  __('page')->insertSnippet('advertisements_create');
 }

 public function footer() {

 }

 public function header() {

 }

 public function meta() {

 }

}

?>
