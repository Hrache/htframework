<?php
if (post_('signupform')) {
	$errors = [];

	// Email original
	if (post_(Accounts::email)) {
		if (!filter_var(post_(Accounts::email), FILTER_VALIDATE_EMAIL)) {
			$errors[Accounts::email][] = sprintf(_abc('wrongdatatype'), strtolower(_abc('email')));
		}
		elseif (__('database')) {
			// Accounts::MODEL is the name of the table of the database
			__('database')->fetch('select from '.Accounts::MODEL.' WHERE', PDO::FETCH_ASSOC);
			$errors[Accounts::email][] = _abc('emailexists');
		}
	}
	else {
		$errors[Accounts::email][] = sprintf(_abc('requiredfield'), strtolower(_abc('email')));
	}

	// Email confirmation
	if (post_(Accounts::email).'c') {
		if (post_(Accounts::email).'c' !== post_(Accounts::email)) {
			$errors[Accounts::email.'c'][] = _abc('emailconferror');
		}
	}
	else {
		$errors[Accounts::email.'c'][] = sprintf(_abc('requiredfield'), strtolower(_abc(Accounts::email.'c')));
	}
	
	// Password
	if (post_(Accounts::password)) {
		if (strlen(post_(Accounts::password)) > 25) {
			$errors[Accounts::password][] = sprintf(_abc('passwordmaxlen'), 25);
		}

		if (strlen(post_(Accounts::password)) < 8) {
			$errors[Accounts::password][] = sprintf(_abc('passwordminlen'), 8);
		}
	}
	else {
		$errors[Accounts::password][] = sprintf(_abc('requiredfield'), strtolower(_abc(Accounts::password)));
	}

	oog($errors);
}
?>