<?php

class PageClass extends PageMethods {

	public function __construct() {
		$action = __('request')->getAction();
		logf('Hello');
		if ($action == 'ajaxmodel') {
			die(DOMOptions_CarModelsByCarBrand(get_('brand')));
		}
		__('language')->append('search');
		__('page')->setTitle(_abc('search'));
		if ($action == 'qs') {
			// $this->quickSearch();
		} elseif ($action == 'as') {
			// $this->advancedSearch();
		} else {
			throw new Error(_abc('wrongactionerror'));
		}
		unset($action);
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