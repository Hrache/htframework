<?php
/**
 * Returns word from vocabulary
 * @param string|int Index of the word in vocabulary
 * @return string
 */
function _abc($index)
{
	return (is_numeric($index)) ? $index : __('language')->getWord($index) ?? '';
}

/**
 * Returns POST data by the given index
 * @param string or int - index of the POST data
 * @return mixed
 */
function post_($index)
{
	return __('request')->postItem($index);
}

/**
 * Returns GET data by index
 * @param string or int - index of the GET data
 * @return mixed
 */
function get_($index)
{
	return __('request')->getItem($index);
}

function setDatabaseConnection(ArrayClass $dbsettings)
{
	$dbclass = new DatabaseClass($dbsettings);

	_di('dbroot', $dbclass);

	$dbclass = $dbclass->connect();

	_di('database', $dbclass);
}

/**
 * Returns the last action from session
 */
function lastAction()
{
	return(__('session')->cookie('lastaction'));
}
?>