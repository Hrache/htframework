<?php
// require_once(Scripts.'account_signup.inc');
// __('language')->append('formvalidation');

lib_load('text');

// if action is "sign-up": signs up: creates account
if (CurrentAction === self::action_signup) {
	require_once(Scripts.'account_signup.inc');
}
// if action is "sign-in": signs in: logs in, means goes online
elseif (CurrentAction === self::action_signin) {
	require_once(Scripts.'account_signin.inc');
}
// if action is "sign-out": signs-out: logs out, means goes offline
elseif (CurrentAction === self::action_signout) {
	__('session')->close();
	header("Location: ".SiteURL);
}
// if action is "delete-account": deletes the account from accounts store (database, etc) 
elseif (CurrentAction === self::action_delete) {
	__('database')->deleteByColumn(intval(get_('accountid')));
}
?>