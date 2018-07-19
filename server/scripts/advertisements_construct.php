<?php
#$query = $account_advs = null;
__('language')->append('advertisements');
acs_PageTitle(_abc('pagetitle'));
// advertisement.pagination
#$this->pageNumber = intval (get_ ('pagenumber'));
#$this->required = __('session')->getCookie ('required') ?? new ArrayClass();
#$this->required = __('session')->getCookie ('required') ?? new ArrayClass();
#$this->additional = __('session')->getCookie ('additional') ?? new ArrayClass();
#$this->errors = __('session')->getCookie ('errors') ?? new ArrayClass();
switch (__('request')->getAction()):
	case ('add'):
		$this->add();
		break;
	case ('async_img_uploads'):
		// advertisements.async_image_uploads
		_di('images', __('request')->getFiles());
		$this->asyncUploadImgs();
		break;
	case ('edit'):
		// advertisements.edit
		$this->edit();
		break;
	case ('delete'):
		// advertisements.delete
		$this->delete();
		break;
	default:{}
endswitch;
// pagination
#$query = "SELECT * FROM `" . AcsAdvertisementsJsonModel::MODEL . "` WHERE `" . AcsAdvertisementsJsonModel::accountid . "`=" . __('account')->id . " LIMIT " . (10 * $this->pageNumber) . ";";
#$account_advs = __('database')->PDOFetchArray ($query, -1);
#unset ($query);