<?php
function getTableName() {
	return __('request')->getPageUrl()->pull()->value;
}
/**
 * modelsettings.phtml
 */
function dbsSelect(): void {
	$_ = __('session')->get(MD5DB);
	array_walk($_, function(&$val) {
		$val = $val[MD5Index::Alias];
	});
	echo arrayToDDown($_, null, '');
}