<?php

class PageClass implements PageInterface {

 public function __construct() {
  $language = __('language');
  $page = __('page');
  $language->append('contacts');
  $page->setTitle(_abc('pagetitle'));
 }

}

?>