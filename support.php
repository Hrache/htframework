<?php
class PageClass extends PageMethods {
	public function __construct() {
		__('language')->append('support');

		__('page')->setTitle(_abc('pagetitle'));
	}
}
?>