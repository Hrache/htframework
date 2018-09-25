<?php
class ErrorHandler extends Error
{
	const ErrorLevelDevelpement = E_ALL;
	const ErrorLevelProduction = E_ERROR;

	public $projectState;

	function __construct(string $message = '', $code = null, $projectState = false)
	{
		$message = sprintf("<p style='font-weight: bold;'>%s</p>", $message);

		parent::__construct($message, $code);
	}
}
?>