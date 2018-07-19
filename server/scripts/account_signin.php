<?php
lib_load('validation');
$errors = new ErrorClass();
$login = post_('loginidentity') ?? post_('signupemail');
$password = post_('loginpassword') ?? post_('signuppassword');
if ($login && $password) {
	$errors->setSingleError('email', !ValidationClass::isEmail($login));
	$errors->setSingleError('password', !ValidationClass::isPassword($password, 8, 32));
	$errorsList = [
		$errors->getSingleError('email'),
		$errors->getSingleError('password'),
	];
	if (!array_search(true, $errorsList)) {
		unset($errorsList, $validator, $errors);
		$qry = AccountModel::getAccountByLoginPassword($login, $password);
		$data = __('database')->PDOFetchArray($qry, 1)->item(0);
		if (!$data) {
			$password = md5($password);
			$data = __('database')->PDOFetchArray($qry, 1)->item(0);
		}
		if ($data) {
			_di('account', $data);
			unset($login, $password, $data);
			if (isset(__('account')->id)) {
				__('session')->setCookie('account', __('account')->id)->setCookie('id', session_id());
			}
		}
	}
}
?>