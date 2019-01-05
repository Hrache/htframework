<?php
class PageClass extends PageMethods {
	function __construct() {
		require_once(Scripts.'search_construct.inc');
	}

	// Content
	function content() {
		__('page')->snippet->insert('message', ['text' => 'You are trying to do some search.']);
	}

	// Quick search
	function quickSearch(): string {
		require_once(Scripts.'seach_quick.inc');
	}

	// Advanced search
	function advancedSearch() {
		$searchResult = quickSearch();
		return $searchResult;
	}
}
?>
