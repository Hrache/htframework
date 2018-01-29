<?php

class PageClass extends PageMethods {

 public function __construct() {
  $language = __('language');
  $page = __('page');
  $language->append('about');
  $page->setTitle(_abc('pagetitle'));
 }

}

?>