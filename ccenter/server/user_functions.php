<?php
function getTableName() {
	return __('request')->getPageUrl()->pull()->value;
}

################ database table model classes page #####################
# The list of databases
function dbsSelect(): string {
	$_ = __('session')->get(MD5DB);
	array_walk($_, function(&$val) {
		$val = $val[MD5Index::Alias];
	});

	return (arrayToDDown($_, null, ''));
}

# HTML options with the database vendors
function dbVendorsDOMOptions(): string {
	$consts = new ReflectionClass('DatabaseClass');
	$consts = $consts->getConstants();
	return $options;
}

// dbVendorsDOMOptions();