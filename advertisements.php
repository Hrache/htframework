<?php
class PageClass extends PageMethods
{
	private $required;
	private $additional;
	private $errors;
	private $pageNumber;

	function __construct()
	{
		require_once(Scripts.'advertisements_construct.inc');
	}

	function addRequired()
	{
		lib_load('validation');
	}

	/**
	 * Description of add()
	 * adds new advertisement into database for an online user
	 * */
	function add()
	{
		require_once(Scripts.'advertisements_add.inc');
	}

	/**
	 * Description of edit()
	 * edits the existing advertisement by given data
	 * */
	function edit(int $id) {}

	/**
	 * Description of delete()
	 * removes the desired advertisement
	 * */
	function delete (int $id) {}

	function asyncUploadImgs()
	{
		require_once(Scripts.'img_upload.inc');
	}

	function resources()
	{
		lib_load('html');

		echo HTMLHelpers::CSSLink('client/css/advs.css');
	}

	// advertisements._documentReady
	function jqueryready()
	{
		require_once(Client.'js'.DIRECTORY_SEPARATOR.'advs.inc.js');
	}

	// advertisements._content
	function content()
	{
		__('language')->append('common_forms', 'measures', 'newadvform', 'carinfo');

		__('page')->snippet->insert('account_advertisements');

		__('page')->snippet->insert('advertisements_create');
	}
}