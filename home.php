<?php
class PageClass extends PageMethods
{
	function __construct()
	{
		__('language')->append('home');

		__('page')->setTitle(_abc('commonpagetitle'));
	}

	function content()
	{
		__('page')->snippet->insert('home_quick_advs');

		__('page')->snippet->insert('home_simple_advs');
	}

	function resources()
	{
		echo HTMLHelpers::CSSLink('client/css/advs.css');
	}
}
?>