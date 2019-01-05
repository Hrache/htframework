<?php
$request = __('request');
$database = __('database');
$finalQuery = false;

if ($finalQuery) {
	$account_sql .= ");";
	return ($account_sql);
}
else {
	return ('');
}
