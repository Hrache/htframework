<?php
if (boolval (__('session')->getCookie ('account'))) {
 throw new Error ('hacked');}

lib_load ('validation');

// data sources
$birthdate = '';

$val = new ValidationClass();
$val->validate();

$errors = new ErrorClass();

// form.name, form.surname
$errors->setSingleError ('personidentity', false);
$errors->setSingleError ('firstname', !ValidationClass::isName (post_ ('firstname')));
$errors->setSingleError ('lastname', !ValidationClass::isName (post_ ('lastname')));

if ($errors->getSingleError ('firstname') || $errors->getSingleError ('lastname')) {
 $errors->setSingleError ('personidentity', true);}

// form.gender
$errors->setSingleError ('gender', !(isEqual (post_ ('gender'), 'm') || isEqual (post_ ('gender'), 'w')));

// form.birthday.year
$errors->setSingleError ('birthyear', !(ValidationClass::isNumeric (post_ ('birthyear'))  && ValidationClass::inRange (intval (post_ ('birthyear')), 1930, intval (date ("Y")))));

// form.birthday.month
$errors->setSingleError ('birthmonth', !(ValidationClass::isNumeric (post_ ('birthmonth')) && ValidationClass::inRange (intval (post_ ('birthmonth')), 0, 11)));

// form.birthday.day
$errors->setSingleError ('birthday', !(ValidationClass::isNumeric (post_ ('birthday')) && ValidationClass::inRange (intval (post_ ('birthday')), 0, $months [intval (post_ ('birthmonth'))])));

// form.birthday.date
$errors->setSingleError ('birthdate', false);

if (!$errors->getSingleError ('birthyear') && !$errors->getSingleError ('birthmonth') && !$errors->getSingleError ('birthday')) {
 $birthdate = post_ ('birthyear')."-".post_ ('birthmonth')."-".post_ ('birthday');}
else {
 $errors->setSingleError ('birthdate', true);}

unset ($months);

// form.phone.local
if (boolval (post_ ('phonecodeid')) && boolval (post_ ('phonenumber'))) {
 // TODO: phonecodeid db_check
 $errors->setSingleError ('phonecodeid', !boolval (post_ ('phonecodeid')));
 $errors->setSingleError ('phonenumber', !ValidationClass::isPhoneNumber (post_ ('phonenumber')));
 $errors->setSingleError ('phonenumberexists', false);

 if (!$errors->getSingleError ('phonecodeid') && !$errors->getSingleError ('phonenumber')) {
  $errors->setSingleError ('phonenumberexists', __('database')->boolQuery ("SELECT `" . AccountModel::MODEL."`.`id` FROM `".AccountModel::MODEL."` WHERE `phonecodeid`='".post_ ('phonecodeid')."' AND `phonenumber`='".post_ ('phonenumber')."';"));}}

// form.e-mail
$errors->setSingleError ('signupemail',  !ValidationClass::isEmail (post_ ('signupemail')));
$errors->setSingleError ('signupemailc', !ValidationClass::isConfirmed (post_ ('signupemail'), post_ ('signupemailc')));
$errors->setSingleError ('emailexists', __('database')->boolQuery ("SELECT `id` FROM `" . AccountModel::MODEL."` WHERE `email`='".post_ ('signupemail')."';"));

// form.password
$errors->setSingleError ('signuppassword',  !ValidationClass::isPassword (post_ ('signuppassword'), 8, 32));
$errors->setSingleError ('signuppasswordc', !ValidationClass::isConfirmed (post_ ('signuppassword'), post_ ('signuppasswordc')));
$errorsList = [
 $errors->getSingleError ('personidentity'),
 $errors->getSingleError ('emailexists'),
 $errors->getSingleError ('phonenumberexists'),
 $errors->getSingleError ('firstname'),
 $errors->getSingleError ('lastname'),
 $errors->getSingleError ('gender'),
 $errors->getSingleError ('birthdate'),
 $errors->getSingleError ('signupemail'),
 $errors->getSingleError ('signupemailc'),
 $errors->getSingleError ('signuppassword'),
 $errors->getSingleError ('signuppasswordc'),];
$stop = false;

foreach ($errorsList as $key => $val) {
 if ($val) {
  $stop = true;}
 else {
  break;}}

if (!$stop) {
 $accountInfo ['id'] = '';
 $accountInfo ['email'] = post_ ('signupemail');
 $accountInfo ['password'] = post_ ('signuppassword');
 $accountInfo ['name'] = post_ ('firstname');
 $accountInfo ['surname'] = post_ ('lastname');
 $accountInfo ['birthday'] = $birthdate;
 $accountInfo ['gender'] = post_ ('gender');
 $accountInfo ['phonecodeid'] = post_ ('phonecodeid');
 $accountInfo ['phonenumber'] = post_ ('phonenumber');
 $accountInfo ['signupdate'] = date ('Y-m-d H:i:s');
 $accountInfo ['lastvisit'] = date ('Y-m-d H:i:s');
 $accountInfo ['personal_additional'] = '';
 __('database')->boolQuery (AccountModel::insertNewAccount ($accountInfo));
 $account = __('database')->PDOFetchArray (AccountModel::getAccountByLoginPassword (post_ ('signupemail'), post_ ('signuppassword')), 1)->item (0);
 unset ($errorsList, $validator, $stop, $accountInfo);}
?>