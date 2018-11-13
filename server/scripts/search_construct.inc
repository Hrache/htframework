<?php
// The list of car brands for the header search form
if (post_('async') === 'carbrands')
{
	die(DOMOptions_CarBrands());
}

switch (CurrentAction)
{
	case ('ajaxmodel'):
	{
		if (post_('brand') && is_numeric(post_('brand')))
		{
			die(DOMOptions_CarModelsByCarBrand(post_('brand')));
		}

		break;
	}
	case ('qs'):
	{
		if (post_('criteria'))
		{
			oog(post_('criteria'));
		}

		break;
	}
	case ('as'):
	{
		__('language')->append('search');
		
		__('page')->setTitle(_abc('search'));

		$this->advancedSearch();

		break;
	}
	default: {}
}
?>