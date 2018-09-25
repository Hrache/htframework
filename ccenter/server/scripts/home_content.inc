<?php
$snippet = null;

if (CurrentAction === StrongPass)
{
	$snippet = StrongPass;
}
elseif (CurrentAction === DbToModel)
{
	$snippet = ModelSettings;
}
else
{
	$snippet = Welcome;
}

if ($snippet)
{
	__('page')->snippet->insert($snippet);
}
else
{
	throw new Error(_abc('nopagefound'));
}
?>