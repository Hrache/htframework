<?php
if (CurrentAction == 'ajaxmodel') {
	die(DOMOptions_CarModelsByCarBrand(get_('brand')));
}
__('language')->append('search');
__('page')->setTitle(_abc('search'));
if (CurrentAction == 'qs') {
	// $this->quickSearch();
}
elseif (CurrentAction == 'as') {
	// $this->advancedSearch();
}
else {
	throw new Error(_abc('wrongactionerror'));
}
?>