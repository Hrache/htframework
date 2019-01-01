<!DOCTYPE html>
<html>
	<head>
		<title>Error</title>
	</head>
	<body>
		<h1>Error</h1>
<?php
if (!ProjectState)
{
	printf('%s<br/>'.PHP_EOL, $e->getLine());

	printf('%s<br/>'.PHP_EOL, $e->getFile());
}
?>
	<?= $e->getMessage() ?>
	</body>
</html>