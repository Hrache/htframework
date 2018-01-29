<?php

class PageClass extends PageMethods {

 public function __construct() {
  __('language')->append('search');
  __('page')->setTitle(_abc('search'));

  switch (__('request')->getAction()) {
   case ('ajaxmodel'): {
     die(DOMOptions_CarModelsByCarBrand(get_('brand')));
    }
   case ('qs'): {
     // $this->quickSearch();
     break;
    }
   case ('as'): {
     // $this->advancedSearch();
     break;
    }
   default: {
     throw new Error(_abc('wrongactionerror'));
    }
  }
 }

 // Content
 public function content() {
  __('page')->insertSnippet('message', ['text' => 'You are trying to do some search.']);
 }

 // Quick search
 public function quickSearch(): string {
  get_file('search_quick.php');
 }

 static function bodytype(string $type): string {
  switch ($type) {
   case 'cp' : return 'Coupe';
   case 'rr' : return 'Roadster';
   case 'hk' : return 'Hatchback';
   case 'pp' : return 'Pickup';
   case 'ci' : return 'Combi';
   case 'mpv' : return 'Mpv';
   case 'wn' : return 'Wagon';
   case 'sn' : return 'Sedan';
   case 'suv' : return 'Suv';
   case 'cle' : return 'Convertible';
   case 'vn' : return 'Van/Minivan';
   case 'tk' : return 'Truck';
   default : return '';
  }
 }

 // Advanced search
 function advancedSearch() {
  $searchResult = quickSearch();
  return $searchResult;
 }

}

?>