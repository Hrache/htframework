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
		__('language')->append('formvalidation');
		lib_load('text');
		switch (CurrentAction) {
			case (self::action_signup) : {
				$this->signup(); break;
			}
			case (self::action_signin) : {
				$this->signin(); break;
			}
			case (self::action_signout) : {
				$this->signout(); break;
			}
			case (self::action_delete) : {
				$this->delete(intval(get_('accountid')));
			}
			default : {}
		}
	}

	private function signup() {
		get_file(Scripts . 'account_signup.php');
	}

	private function signin() {
		get_file(Scripts . 'account_signin.php');
	}

	private function signout() {
		__('session')->close();
		header("Location: " . SiteURL);
	}

	private function delete(int $id) {
		__('database')->deleteByColumn($id);
	}

	function content() {
		if (__('account')) {
			acs_PageTitle(_abc('accountinfo'));
			__('page')->insertSnippet('account_info');
		} else {
			__('page')->setTitle(_abc('pagetitle'));
			__('page')->insertSnippet('account_signup_form');
		}
	}

	function resources() {
		if (!__('session')->cookieExists('account')) {
			echo (HTMLHelpers::JSScript('client/js/md5.min.js'));
		}
		echo (HTMLHelpers::JSScript('client/js/account.js'));
	}

	public function domonload() {
?>
		var fdate = new FormDate('bday', 'bmonth', 'byear', '<?= AcsAccountTblModel::birthday ?>');
		$('#' + fdate.dayid).change(function() {
			fdate.createDate();
		});
		$('#' + fdate.monthid).change(function() {
			fdate.createDate();
		});
		$('#' + fdate.yearid).change(function() {
			fdate.createDate();
		});
<?php
	}
}