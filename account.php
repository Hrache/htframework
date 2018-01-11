<?php
class PageClass implements PageInterface {
 private $signup;

 public function __construct() {
  __('language')->append ('formvalidation');
  lib_load ('text');

  // account.action
  switch (__('request')->getAction()) {

   // account.signup
   case ('signup'): {
    $this->signup(); break;}

   // account.signin
   case ('signin'): {
    $this->signin(); break;}

   // account.signout
   case ('signout'): {
    $this->signout(); break;}

   // account.signout
   case ('delete'): {
    $this->delete (intval (__('request')->getItem ('accountid'))); break;}
   default: {}
  }
 }

 public function signup() {
  get_file (Scripts . 'account_signup.php');
 }

 public function signin() {
  get_file (Scripts . 'account_signin.php');
 }

 // account.signout
 public function signout() {
  __('session')->close();
  header ("Location: ".SiteURL);
 }

 public function delete (int $id) {
  __('database')->deleteByColumn ($id);
 }

 public function content() {
  if (__('account')) {
   acs_PageTitle (_abc ('accountinfo'));
   __('page')->insertSnippet ('account_info');}
  else {
   __('page')->setTitle (_abc ('pagetitle'));
   __('page')->insertSnippet ('account_signup_form');}
 }

 // account.resources
 public function resources() {
  if (!__('session')->cookieExists ('account')) {
   echo HTMLHelpers::JSScript ('view/res/js/md5.min.js');}
 }

 public function meta() {}
 public function header() {}
 public function jsDocReady() {}
 public function footer() {}

 /**
  * @return mixed $signup
  */
 public function getSignup() {
  return $this->signup;
 }

 /**
  * @param mixed $signup
  */
 public function setSignup ($signup): PageClass {
  $this->signup = $signup;
  return $this;
 }
}