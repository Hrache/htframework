<?php

class PageClass extends PageMethods {
	private $required;
	private $additional;
	private $errors;
	private $pageNumber;

	public function __construct() {
		# $query = $account_advs = null;
		__('language')->append('advertisements');
		acs_PageTitle(_abc('pagetitle'));

		// advertisement.pagination
		# $this->pageNumber = intval (get_ ('pagenumber'));
		// properties
		#$this->required = __('session')->getCookie ('required') ?? new ArrayClass();
		##$this->required = __('session')->getCookie ('required') ?? new ArrayClass();$this->additional = __('session')->getCookie ('additional') ?? new ArrayClass();
		#$this->errors = __('session')->getCookie ('errors') ?? new ArrayClass();

		switch (__('request')->getAction()) {
			case ('add'): {
				$this->add();
				break;
			}
			case ('async_img_uploads'): {// advertisements.async_image_uploads
				_di('images', __('request')->getFiles());
				$this->asyncUploadImgs();
				break;
			}
			case ('edit'): {// advertisements.edit
				$this->edit();
				break;
			}
			case ('delete'): {// advertisements.delete
				$this->delete();
				break;
			}
			default:{

				}
		}

		// pagination
		# $query = "SELECT * FROM `" . AcsAdvertisementsJsonModel::MODEL . "` WHERE `" . AcsAdvertisementsJsonModel::accountid . "`=" . __('account')->id . " LIMIT " . (10 * $this->pageNumber) . ";";
		# $account_advs = __('database')->PDOFetchArray ($query, -1);
		# unset ($query);
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
	public function edit(int $id) {

	}

	/**
	 * Description of delete()
	 * removes the desired advertisement
	 * */
	public function delete(int $id) {

	}

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