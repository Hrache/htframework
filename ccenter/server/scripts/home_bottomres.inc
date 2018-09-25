<?php
$snippet = '';

if (CurrentAction === DbToModel)
{
	$snippet = 'dbtomodel_bottom';
}

if ($snippet)
{
	__('page')->snippet->insert($snippet);
}
?>