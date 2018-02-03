<?php
define('Img_uploads', Shared . 'image_store' . DIRECTORY_SEPARATOR);
define('ImgURL', 'image_store/');
define('Layouts', Snippets . 'layouts' . ds);

lib_load('html');

// Account
$account = $errors = null;
_di('account', $account);
_di('errors', $errors);

// requiring the user_functions.php file which is
require_once('user_functions.php');

// language
$language->append('common', 'common_carinfo', 'errors');

// setting for header search
$settings->setSetting('useheadersearch', true);



if (CurrentPage === 'account' || __('session')->cookieExists('account')) {
 /**
  * @var pre_res resources from preinit.php file
  * created for default template file
  */
 _di('pre_res', implode(PHP_EOL, [HTMLHelpers::CSSLink("client/css/account.css"),]));
 $language->append('signup', 'date', 'account');
}

// account session restoration
if (__('session')->cookieExists('account')) {
 if (CurrentPage === 'advertisements') {
  $settings->setSetting('useheadersearch', false);
 }

 if (!boolval($account = __('database')->PDOFetchArray(AccountModel::getAccountByAccountId(__('session')->getCookie('account')), 1)->item(0))) {
  throw new Error('sessionrestoreerror1');
 }

 _di('account', $account);
 $page->setTitle(__('account')->name . ' ' . __('account')->surname);

 // updating the last visit date
 if (!__('database')->boolQuery(AccountModel::updateLastVisit(__('account')->id))) {
  throw new Error('backenderror1');
 }
}

if (!boolval(__('account')) && in_array($request->getPage(), ['advertisements'])) {
 throw new Error('onlinepageerror');
}