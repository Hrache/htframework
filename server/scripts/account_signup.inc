<?php
if (CurrentAction === 'signup' && post_('signupform')) {
	$errors = [];

	# Email
	if (!filter_var(post_(Accounts::email), FILTER_VALIDATE_EMAIL)) {
		$errors[Accounts::email][] = _abc('reqedorwrong');
	}
	elseif (__('database')) {
		__('database')->PDOFetchArray('select from '.Accounts::MODEL.' WHERE');
	}
	elseif (post_(Accounts::email).'c' !== post_(Accounts::email)) {
		$errors[Accounts::email.'c'][] = _abc('emailconferror');
	}

	if (filter_var(post_(Accounts::password), FILTER_VALIDATE_EMAIL)) {}

	die(print_r(__('request')->getPosts(), true));
}
?>