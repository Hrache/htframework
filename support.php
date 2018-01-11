<?php
class PageClass implements PageInterface {
 public function __construct() {
  $language = __('language');
  $page = __('page');
  $language->append ('support');
  $page->setTitle (_abc ('pagetitle'));
 }

 public function content() {}
 public function footer() {}
 public function header() {}
 public function jsDocReady() {}
 public function meta() {}
 public function resources() {}
}
?>