<?php
if (post_('async') === 'countries')
{
	die(DOMOptions_PostalInfo(false, '', [0, 4]));
}

require_once(Scripts.'account_signup.inc');

__('language')->append('formvalidation');

lib_load('text');

if (CurrentAction === self::action_signin)
{
	require_once(Scripts.'account_signin.inc');
}
elseif (CurrentAction === self::action_signout)
{
	__('session')->close();
	header("Location: ".SiteURL);
}
elseif (CurrentAction === self::action_delete)
{
	__('database')->deleteByColumn(intval(get_('accountid')));
}
?>