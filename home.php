<?php
class PageClass extends PageMethods {
	function __construct() {
		__('language')->append('home');
		__('page')->setTitle(_abc('commonpagetitle'));
	}

	function content() {}

	function resources() {
		echo HTMLHelpers::CSSLink('client/css/advs.css');
	}
}
?>