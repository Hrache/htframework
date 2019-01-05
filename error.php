<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>ERROR Page</title>
		<style type="text/css">
		.message {
			color: #c60000;
			font-size: 14pt;
			font-family: "Times New Roman", Georgia, Serif;
		}
		</style>
	</head>
	<body>
		<img src="client/images/error.png" style="display: "/>
		<pre class="message"><?= print_r($e->getMessage(), true) ?></pre>
	</body>
</html>