<?php
class PageClass extends PageMethods {
	public function __construct() {
		__('language')->append('about');
		__('page')->setTitle(_abc('pagetitle'));
	}
}
?>