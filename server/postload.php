<?php
define('Img_uploads', Files.'image_store'.DIRECTORY_SEPARATOR);
define('ImgURL', 'image_store/');
define('Layouts', Snippets.'layouts'.ds);

// load the html sub-lib
lib_load('html');

// Account
$account = $errors = null;

_di('account', $account);
_di('errors', $errors);

// Requiring the user_functions.php file which is
require_once('user_functions.inc');

// Language
__('language')->append('common', 'errors');

// Setting for header search
$settings->setSetting('useheadersearch', true);

// if is logged in load some front end stuff (resources, language files)
/*
if (CurrentPage === 'account' || __('session')->cookieExists('account')) {
	// @var pre_res resources from preload.php file created for default template file
	_di('pre_res', implode(PHP_EOL, [HTMLHelpers::CSSLink("client/css/account.css")]));

	$language->append('signup', 'date', 'account');
}

// Account session restoration per-request
if (__('session')->cookieExists('account')) {
	if (CurrentPage === 'advertisements') {
		$settings->setSetting('useheadersearch', false);
	}

	$account = __('database')->fetch(AcsAccountTblModel::getAccountByAccountId(__('session')->getCookie('account')), PDO::FETCH_ASSOC);
	
	if (!$account) {
		throw new Error(_abc('sessionrestoreerror1'));
	}

	_di('account', $account);
	
	$page->setTitle(__('account')->name.' '.__('account')->surname);

	// Updating the last visit date
	if (!__('database')->boolQuery(AcsAccountTblModel::updateLastVisit(__('account')->id)))	{
		throw new Error(_abc('backenderror1'));
	}
}
*/
?>