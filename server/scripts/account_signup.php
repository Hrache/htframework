<?php
if (boolval(__('session')->getCookie('account'))) {
	throw new Error(_abc('hacked'));
}
lib_load('db/mysql/model', 'validation');
$signin = boolval(__('request')->getPosts()->grab('signin'));
$validation = new ValidationClass();
$validation->addSimpleString(
		AcsAccountTblModel::name,
		post_(AcsAccountTblModel::name),
		AcsAccountTblModel::getMinLengthRule(AcsAccountTblModel::name),
		AcsAccountTblModel::getMaxLengthRule(AcsAccountTblModel::name));
$validation->addSimpleString(
		AcsAccountTblModel::surname,
		post_(AcsAccountTblModel::surname),
		AcsAccountTblModel::getMinLengthRule(AcsAccountTblModel::surname),
		AcsAccountTblModel::getMaxLengthRule(AcsAccountTblModel::surname));
$validation->addEmail(
		AcsAccountTblModel::email,
		post_(AcsAccountTblModel::email),
		post_(AcsAccountTblModel::email . 'c')
	)->addDataSource(
		AcsAccountTblModel::email,
		__('database')->boolQuery(sprintf('SELECT * FROM %s WHERE %s=%s;', AcsAccountTblModel::MODEL, AcsAccountTblModel::email, post_(AcsAccountTblModel::email))));
$validation->addPassword(
		AcsAccountTblModel::password,
		post_(AcsAccountTblModel::password),
		post_(AcsAccountTblModel::password . 'c'));


// data sources
$birthdate = '';
$account = __('database')->PDOFetchArray(AcsAccountTblModel::getAccountByLoginPassword(post_('signupemail'), post_('signuppassword')), 1)->item(0);
unset($errorsList, $validator, $stop, $accountInfo);
?>