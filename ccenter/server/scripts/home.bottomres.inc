<?php
$snippet = '';

if (CurrentAction === ModelSettings)
{
	$snippet = 'dbtomodel_bottom';
}

if ($snippet)
{
	__('page')->snippet->insert($snippet);
}
?>
