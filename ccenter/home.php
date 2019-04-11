<?php
class PageClass extends PageMethods {
	function __construct() {
		require_once(Scripts.'home.construct.inc');
	}

	function content() {
		require_once(Scripts.'home.content.inc');
	}

	function bottomres() {
		require_once(Scripts.'home.bottomres.inc');
	}
	
	function topres() {
		require_once(Scripts.'home.topres.inc');
	}
}
?>