<?php
class PageClass implements PageInterface {
 function __construct() {
  __('language')->append ('home');
  __('page')->setTitle (_abc ('commonpagetitle'));
 }

 function content() {
  __('page')->insertSnippet ('home_quick_advs');
  __('page')->insertSnippet ('home_simple_advs');
 }

 function resources() {
  echo HTMLHelpers::CSSLink ('view/res/advs.css');
 }

 function footer() {}
 function header() {}
 function jsDocReady() {}
 function meta() {}
}
?>