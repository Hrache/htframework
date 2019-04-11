<?php
class PageClass extends PageMethods {
	public function __construct() {
		__('language')->append('termsofuse');

		__('page')->setTitle(_abc('pagetitle'));
	}
}
?>