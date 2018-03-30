<?php

class PageClass extends PageMethods {
	public function __construct() {
		__('language')->append('contacts');
		__('page')->setTitle(_abc('pagetitle'));
	}
}

?>