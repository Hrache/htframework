<?php
/**
 * The class of the response
 * The class below contains action methods of the sub-page
 */
class PageClass extends PageMethods {
	/**
	 * @var mixed Indicates the sign-up
	 */
	private $signup;
	const action_signup = 'signup';
	const action_signin = 'signin';
	const action_signout = 'signout';
	const action_delete = 'delete';

	function __construct() {
		require_once(Scripts.'account_construct.inc');
	}

	function content() {
		if (__('account')) {
			acs_PageTitle(_abc('accountinfo'));
			__('page')->snippet->insert('account_info');
		}
		else {
			__('page')->setTitle(_abc('pagetitle'));
			__('language')->append('date', 'signup');
			__('page')->snippet->insert('form_signup_account');
		}
	}

	function resources() {
		if (!__('session')->cookieExists('account')) {
			echo (HTMLHelpers::JSScript('http://localhost/libs/md5.min.js'));
		}
	}

	function jqueryready() {
		class_exists('AccountsModel');
		require_once(Client.'js'.DIRECTORY_SEPARATOR.'accountsignup.js');
	}
}
