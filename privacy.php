<?php
class PageClass implements PageInterface {
 public function __construct() {
  __('language')->append ('privacy');
  __('page')->setTitle (_abc ('pagetitle'));}

 public function content() {}
 public function footer() {}
 public function header() {}
 public function jsDocReady() {}
 public function meta() {}
 public function resources() {}
}
?>