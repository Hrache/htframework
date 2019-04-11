<?php
final class StringHelper {
	/**
	 * Description of lastSignSlash
	 * @param string $path
	 * @return void
	 **/
	public static function lastSignSlash (string &$path): void	{
		$lastsign = $path [strlen ($path) - 1];
		if ($lastsign != '/' || $lastsign != '\\') $path .= DIRECTORY_SEPARATOR;

		unset ($lastsign);
	}

	// turns first letter of the string into upper
	static function firstLetterToUpper (string $strvar): string {
		return strtoupper ($strvar [0]) . substr ($strvar, 1, strlen ($strvar) - 1 );
	}

	// generates random string by given amount of characters
	static function randomString (int $length = 25): string {
		$id = "";
		$chars = str_shuffle ("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789");
		for ($i = 0; $i < $length; $i++) $id .= $chars [rand (0, strlen ($chars) - 1)];

		return ($id);
	}

	/**
	 * Description of the latsCharIs
	 * @param string $subject subject text data
	 * @param string $char character that is looked for
	 *
	 * @return bool true in case if the $char is the last, false in opposite case
	 **/
	static function latsCharIs (string $subject, string $char): bool {
		return ((($subject [strlen ($subject) - 1]) == $char)? true : false);
	}

	/**
	 * Description of echo_eol
	 *
	 * @param $text string - some text
	 * @return string
	 **/
	static function _eol (string $text = '') {
		echo $text . PHP_EOL;
	}

	/**
	 * Description of stringCleanup
	 * it cleans up all malicious/restricted characters in/from data
	 *
	 * @param string $data
	 *        	text-data
	 * @return string the text-data argument
	 **/
	static function stringCleanup (string $data): string {
		$data = trim ($data);
		$data = stripslashes ($data);
		$data = htmlspecialchars ($data);
		return $data;
	}
}
?>