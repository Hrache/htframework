<?php
class PageClass extends PageMethods
{
	function __construct()
	{
		require_once(Scripts.'home_construct.inc');
	}

	function content()
	{
		require_once(Scripts.'home_content.inc');
	}

	function bottomres()
	{
		require_once(Scripts.'home_bottomres.inc');
	}
}
?>