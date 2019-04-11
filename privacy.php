<?php
class PageClass extends PageMethods {
	public function __construct() {
		__('language')->append('privacy');

		__('page')->setTitle(_abc('pagetitle'));
	}
}
?>