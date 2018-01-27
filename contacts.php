<?php

class PageClass implements PageInterface {

 public function __construct() {
  $language = __('language');
  $page = __('page');
  $language->append('contacts');
  $page->setTitle(_abc('pagetitle'));
 }

 public function jsDocReady() {

 }

 public function meta() {

 }

 public function resources() {

 }

 public function content() {

 }

 public function footer() {

 }

 public function header() {

 }

}

?>