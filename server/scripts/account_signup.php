<?php

if (boolval(__('session')->getCookie('account'))) {
 throw new Error('hacked');
}

lib_load('validation');

// data sources
$birthdate = '';

__('database')->boolQuery(AccountModel::insertNewAccount($accountInfo));
$account = __('database')->PDOFetchArray(AccountModel::getAccountByLoginPassword(post_('signupemail'), post_('signuppassword')), 1)->item(0);
unset($errorsList, $validator, $stop, $accountInfo);
?>