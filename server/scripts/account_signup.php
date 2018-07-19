<?php
if (__('session')->getCookie('account')) throw new Error(_abc('hacked'));
lib_load('db/mysql/model', 'validation');
$signin = __('request')->getPosts()->grab('signin');
use AcsAccountTblModel as Accounts;
$validation = new ValidationClass();
$validation->addSimpleString(
				Accounts::name,
				post_(Accounts::name),
				2,
				Accounts::getMaxLengthRule(Accounts::name));
$validation->addSimpleString(
				Accounts::surname,
				post_(Accounts::surname),
				2,
				Accounts::getMaxLengthRule(Accounts::surname));
$validation->addEmail(
				Accounts::email,
				post_(Accounts::email),
				post_(Accounts::email . 'c'))
				->addDataSource(
								Accounts::email,
								__('database')->boolQuery(sprintf('SELECT * FROM %s WHERE %s=%s;', Accounts::MODEL, Accounts::email, post_(Accounts::email))));
$validation->addPassword(
				Accounts::password,
				post_(Accounts::password),
				post_(Accounts::password . 'c'));
$validation->addDate(
				Accounts::birthday,
				ValidationClass::DATE_FORMAT_1,
				post_(Accounts::birthday));
$newEntry = new ValidationEntry(
				Accounts::phonenumber,
				post_(Accounts::phonenumber));
$newEntry->addRule(
				ValidationEntry::RuleRegEx,
				ValidationBase::Digits);
$newEntry->addRule(
				ValidationEntry::RuleRange,
				[6, Accounts::getMaxLengthRule(Accounts::phonenumber)]);
$validation->addEntry($newEntry);
// data sources
$birthdate = '';
$account = __('database')->PDOFetchArray(Accounts::getAccountByLoginPassword(post_('signupemail'), post_('signuppassword')), 1)->item(0);
unset($errorsList, $validator, $stop, $accountInfo);
?>