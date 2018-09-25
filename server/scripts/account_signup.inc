<?php
if (CurrentAction === 'signup' && post_('signupform'))
{
	$errors = [];

	if (!filter_var(post_(Accounts::email), FILTER_VALIDATE_EMAIL))
	{
		$errors[Accounts::email][] = _abc('reqedorwrong');
	}
	else if (__('database'))
	{

	}
	else if (post_(Accounts::email).'c' !== post_(Accounts::email))
	{
		$errors[Accounts::email.'c'][] = _abc('emailconferror');
	}

	if (filter_var(post_(Accounts::email), FILTER_VALIDATE_EMAIL))
	{

	}

	die(print_r(__('request')->getPosts(), true));
}
?>