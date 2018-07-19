<?php
class PageClass extends PageMethods {
	private $required;
	private $additional;
	private $errors;
	private $pageNumber;
	public function __construct() {
		require_once(Scripts.'advertisements_construct.php');
	}
	public function addRequired() {
		lib_load('validation');
	}
	/**
	 * Description of add()
	 * adds new advertisement into database for an online user
	 * */
	public function add() {
		get_file('advertisements_add.php');
	}
	/**
	 * Description of edit()
	 * edits the existing advertisement by given data
	 * */
	public function edit(int $id) {}
	/**
	 * Description of delete()
	 * removes the desired advertisement
	 * */
	public function delete(int $id) {}
	public function asyncUploadImgs() {
		die(print_r(__('request')->getFiles(), true));
		get_file('img_upload.php');
	}
	public function resources() {
		lib_load('html');
		echo HTMLHelpers::CSSLink('client/css/advs.css');
	}
	// advertisements._documentReady
	public function domonload() {
		get_file('client/js/advs.inc.js');
	}
	// advertisements._content
	public function content() {
		__('language')->append('common_forms', 'measures', 'newadvform', 'carinfo');
		__('page')->insertSnippet('account_advertisements');
		__('page')->insertSnippet('advertisements_create');
	}
}