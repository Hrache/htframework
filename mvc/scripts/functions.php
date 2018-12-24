<?php
$lib = dirname(__DIR__);

spl_autoload_register();

if (array_search('core.php', scandir($lib)))
{
	/**
	 * The paths as arguments will be added to the include directories
	 * @param  string ...$args
	 * @return void
	 */
	function lib_load(string ...$args)
	{
		global $lib;

		while ($args)
		{
			$item = $lib.DIRECTORY_SEPARATOR.array_shift($args);

			if (!stristr(get_include_path(), $item))
			{
				if (!is_dir($item))
				{
					if (!file_exists($item))
					{
						$item .= '.php';

						if (!file_exists($item))
						{
							continue;
						}
					}

          # file.require
					require_once($item);

					continue;
				}

				set_include_path(get_include_path().PATH_SEPARATOR.$item);
			}
		}
	}

	/**
	 * Removes those sub-libraries
	 * @param string ...$args The names of the sub-libraries or classes directly
	 * @return void
	 */
	function lib_unload(string ...$args): void
	{
		$baseDir = dirname(dirname(__FILE__));

		foreach ($args as $ind => $item)
		{
			// TODO: finish up
			if (!is_dir($item) && !is_dir(dirname($item)) || is_file($item))
			{

			}

			$item = PATH_SEPARATOR . __DIR__ . DIRECTORY_SEPARATOR . $item;

			str_replace($item, '', get_include_path());

			unset($args [$ind]);
		}
	}

	function lastSignSlash(string &$path): void
	{
		$lastsign = $path[strlen($path) - 1];

		if ($lastsign != '/' && $lastsign != '\\')
		{
			$path .= DIRECTORY_SEPARATOR;
		}

		unset($lastsign);
	}

	lib_load('utilities');

	# Global variable only around the project
	if (class_exists('ArrayClass'))
	{
		/**
		 * Almost the same as PHPs "scandir()" except it doesn't
		 * return first two elements
		 * @param string $path the path which will be scanned
		 * @param bool $object The type of the returned data
		 * @return mixed ArrayClass | array
		 */
		function scandir_c(string $path, bool $filesOnly = true, bool $object = true)
		{
			$path = (is_file($path))? dirname($path) : $path;

			lastSignSlash($path);

			$data = new ArrayClass(scandir($path));

			$data->del(0, 1);

			$return = new ArrayClass();

			while (!$data->isEmpty())
			{
				$i = $data->pull();

				if ($filesOnly && !is_dir($path . ($i->value)))
				{
					$return->add(null, $i->value);
				}
			}

			unset($path, $data);

			return(($object)? (new ArrayClass(array_values($return->input))) : $return->input);
		}

		/**
		 * Turn provided data into drop down menu
		 * @param mixed $data The info for
		 * @param array|ArrayClass $attrs Attributes of the DOM select
		 * in case if its null only options will be returned
		 */
		function arrayToDDown($data, $attrs = [], string $empty = ''): string
		{
			if (!($attrs instanceof ArrayClass) && boolval($attrs) && !is_array($attrs))
			{
				die(__FUNCTION__." expects second parameter to be array or ArrayClass.".gettype($attrs));
			}
			elseif (!is_array($data))
			{
				return $data;
			}
			elseif (is_array($data))
			{
				$options = ($empty || ($empty === '')) ? '<option value="">' . $empty . '</option>' . PHP_EOL : '';

				if ($attrs)
				{
					if (is_array($attrs))
					{
						$attrs = new ArrayClass($attrs);
					}

					$attr = new ArrayClass();

					while (!$attrs->isEmpty())
					{
						$i = $attrs->pull();

						$attr->add(null, sprintf('%s="%s"', $i->key, $i->value));
					}

					$attr = implode(' ', $attr->input);
				}

				$data = new ArrayClass($data);

				while (!$data->isEmpty())
				{
					$d = $data->pull();
					$options .= sprintf('<option value="%s">%s</option>' . PHP_EOL, $d->key, $d->value);
				}

				$options = trim($options);

				return ($attrs)? sprintf('<select%s>'.PHP_EOL.'%s</select>', ' '.$attr, $options) : $options;
			}
		}

		$data = new ArrayClass();

		function __($key) {

			global $data;
			return $data->item($key);
		}

		function _di($key, $val) {

			global $data;
			$data->add($key, $val);
		}

		function _d8($key, &$val) {

			global $data;
			$data->add($key, $val);
		}

		function _dx($key) {

			global $data;
			$data->del($key);
		}

		function _db($key) {

			global $data;
			return boolval($data->item($key));
		}
	}
}
else {

	die('Error: System file is missing.');
}

/**
 * Echos html option
 */
function html_option($text, $value, $selected = false)
{
	printf('<option value="%s" %s>%s</option>'.PHP_EOL, $value, (!$selected)? '': 'selected="selected"', htmlspecialchars($text));
}

/**
 *	Checks whether $op1 is equal to $op2 in a strict or loos manner
 *	@param mixed $op1 The first operand
 *	@param mixed $op2 The first operand
 *	@param bool $strict Decides whether do strict comparison or lose
 *	@return bool
 */
function is($op1, $op2, bool $strict = false): bool {

	return(($strict)? $op1 === $op2: $op1 == $op2);
}

/**
 * It does the operation in case of positive condition
 * @param bool $exprCondition Some boolean expression/value
 * @param callable $function In case of first parameter this function will be called
 * @return void
 */
function do_if(bool $exprCondition, callable $function): void {

	if ($exprCondition)	{

		call_user_func($function);
	}
}

/**
 * Description of _tag
 * generates any type of HTML tag by given arguments
 *
 * @param string $formElementTag - name of HTML form element tag
 * @param array $attributes - list of attributes and values for the form element
 * @param bool $closed - false if is not closed tag, true if is closed tag
 * @return string - representation of the string element
 *
 */
function _tag(string $tagName, array $attrs = [], bool $closed = false, string $data = ''): string {

	$_attrs = '';

	foreach ($attrs as $attr => $value) {

		$_attrs .= sprintf(' %s="%s"', $attr, $value);
	}

	return sprintf('<%s %s%s%s' . PHP_EOL, $tagName, $_attrs, ($closed) ? '>' : ' />', ($closed) ? sprintf('%s</%s>', $data, $tagName) : '');
}

/**
 * Description of filename_without_ext
 * retrieves the name of the file without extension
 *
 * @param array $filepath name of the file or full path of the file
 * @return string name of the file without extension
 */
function filenamenoext(string $filepath): string
{
	return pathinfo($filepath, PATHINFO_FILENAME);
}

/**
 * html_list creates unordered list within given parameters
 * @param array $attrs associative list of attributes of html ul
 * @param array $data_items list elements
 * @return void prints the list
 */
function html_list(array $attrs = [], array $data_items)
{
	$_attr = '';

	foreach ($attrs as $name => $val)
	{
		$_attr .= sprintf(' %s="%s"', $name, $val);
	}

	$_data = '';

	foreach ($data_items as $i => $item)
	{
		$_data .= sprintf('<li>%s</li>' . PHP_EOL, $item);
	}

	printf('<ul%s>%s</ul>' . PHP_EOL, $_attr, $_data);

	unset($_attr, $_data);
}

/**
 * Returns HTML code text
 * @param array $data Array of data for HTML option tags,
 * each element of the array is an HTML option
 * @param int $offsetOfSelected The offset of selected HTML option
 * (array starts from 0)
 * @return string text data which consists of HTML options within value and text
 *
 */
function html_dropdown_items(array $data, int $offsetOfSelected): string
{
	$_options = '';

	for ($i = 1; $i <= count($data); $i++)
	{
		$_options .= html_option($data[$i-1], $i, ($i == intval($offsetOfSelected)) ? true : false);
	}

	return $_options;
}

/**
 * Advanced variant of data-printing within stop-code-execution
 * @param mixed ...$args Any type or quantity of data
 * @return void Prints out the arguments
 */
function oog(...$args)
{
	printf('<div class="w3-alert">%s<br/>%s</div>', date("h:m:s  d D M Y"), print_r($args, true));

	exit();
}

function _phpeol()
{
	echo PHP_EOL;
}

// Encodes array elements and/or single string values into UTF8
function utf8_encode_deep(&$input)
{
	if (is_string($input))
	{
		$input = utf8_encode(trim($input));
	}
	elseif (is_array($input))
	{
		foreach ($input as &$value)
    {
			utf8_encode_deep($value);
    }

		unset($value);
	}
	elseif (is_object($input))
	{
		$vars = array_keys(get_object_vars($input));

		foreach ($vars as $var)
		{
			utf8_encode_deep($input->$var);
		}
	}
}

/**
 * Alternate algorithm for php.ucfirst() function
 * capitalization of the text/string
 */
function firstLetterToUpper(string $strvar): string
{
	return strtoupper($strvar [0]) . substr($strvar, 1, strlen($strvar) - 1);
}

/**
 * Generates random string by the given amount of characters
 * @param int $length The desired length of the string
 * @return string
 */
function randomString(int $length = 25): string
{
	$id = "";
	$chars = str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789");

	for ($i = 0; $i < $length; $i++)
	{
		$id .= $chars [rand(0, strlen($chars) - 1)];
	}

	return ($id);
}

/**
 * Write data into the logfile.txt
 * @param mixed $data
 * @param string $fileorpath
 * @retrun void
 */
function logf($data, string $fileorpath = '')
{
	$defaultFilename = 'logfile.txt';

	if (is_dir($fileorpath))
	{
		$file = $fileorpath . DIRECTORY_SEPARATOR . $defaultFilename;
	}
	elseif (!file_exists($fileorpath))
	{
		$file = dirname(__DIR__).DIRECTORY_SEPARATOR.$defaultFilename;
	}

	file_put_contents($file, var_export($data, true), FILE_APPEND);
}

# Checks wheather two values are equal or no
function isEqual($var1, $var2): bool
{
	return (($var1 == $var2) ? true : false);
}

/**
 * 1st 3 parameters are the same as in PHP's range() function
 * @param bool $seleced
 * @return void
 * */
function DOMRangeOptions(int $start, int $end, $selected = false, int $step): string
{
	$digits = range($start, $end, 1);
	$items = '';

	lib_load('html');

	foreach ($digits as $i => $data)
	{
		$_selected = ($selected === $data) ? true : false;
		$items .= HTMLHelpers::DOMOption($data, $data, $_selected);
	}

	unset($digits);
	return $items;
}

function belongsTo(int $val, int $from, int $to): bool
{
	return (($val >= $from && $val <= $to) ? true : false);
}

/**
 * Convert any backslash into URL separator
 * @param string - path
 * @return string - same path platformalized
 */
function _urls(string $path)
{
	return str_replace("\\", '/', $path);
}

/**
 * Convert any slash into DIRECTORY_SEPARATOR
 * @param string The input path-string
 * @return string Modified path
 */
function _ds(string $path): string
{
	$path = (is_file($path))? dirname($path): $path;

	return str_replace((DIRECTORY_SEPARATOR == "\\")? "/" : "\\", DIRECTORY_SEPARATOR, $path).DIRECTORY_SEPARATOR;
}

/**
 * Returns the $folder directory from $dir
 * @param string $dir The directory whichj contains the $folder
 * @return string The full path of the folder
 */
function _cdir(string $dir, string $folder): string
{
	$dir = _ds($dir);
	$dir = explode(DIRECTORY_SEPARATOR, $dir);

	for ($i = count($dir) - 1; $i >= 0; $i--)
	{
		if ($dir[$i] != $folder)
		{
			unset($dir[$i]);
		}
		else
		{
			break;
		}
	}

	return _ds(implode(DIRECTORY_SEPARATOR, $dir));
}

/**
 *
 * @param string $subject subject text data
 * @param string $char character that is looked for
 * @return bool true in case if the $char is the last, false in opposite case
 */
function lastCharacterIs(string $subject, string $char): bool
{
	return ((($subject[strlen($subject) - 1]) == $char) ? true : false);
}

/**
 * Description of getArrayFromFile
 * @param $path string Path of the file
 * @param $file string The filename and the extension
 * @return Array Empty if file does not exists or wasn't found
 */
function getArrayFromFile(string $path = '', string $file, $index = null): Array
{
	return file_exists($path . $file) ? require_once($path . $file) : [];
}

/**
 * Checks whether the given integer belongs to the given integer range
 * @param int $a Observable data
 * @param int $b range start
 * @param int $c range end
 * @return bool TRUE If in given range else FALSE
 */
function is_inrange(int $a, int $b, int $c): bool
{
	if ((($a >= $b) && ($a < $c)) || (($a > $b) && ($a <= $c)))
	{
		return true;
	}

	return false;
}

/**
 * Returns the last element of the array that is given by reference
 * @param &$php_array array
 * @return mixed
 */
function array_last(array &$php_array)
{
	return ($php_array[count($php_array) - 1]);
}

/**
 * Returns value of the array element
 * @return mixed false in case if no element by the given
 * path, the element on the other opposite case
 */
function array_item($array, ...$keys)
{
	while ($keys)
	{
		$key = array_shift($keys);

		if (isset($array[$key]))
		{
			$array = $array[$key];

			if (!is_array($array))
			{
				return $array;
			}
		}
	}

	return false;
}

/**
 * @param $text string - some text
 * @return string
 */
function _eol(string $text = ''): void {

	echo $text.PHP_EOL;
}

function html_phpeol(): void {

	echo('<br/>'.PHP_EOL);
}

/**
 * It cleans up all malicious/restricted characters in/from data
 * @param string $data text-data
 * @return string the text-data argument
 */
function stringCleanup(string $data): string {

	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	$data = strip_tags($data);

	return $data;
}

/**
 * Return an element from array if it does exist
 * @param array &$array the array
 * @param mixed $index the key/index of an element in the array
 * @return mixed | empty string
 */
function _item(array &$array, $index) {

	return (isset($array[$index])? $array[$index] : '');
}

function _delete(array &$arr, string $index): bool {

	if (_item($arr, $index)) {

		unset($arr[$index]);

		return true;
	}

	return false;
}

/**
 *
 * @param array &$keys the array of keys to be checked for a presence
 * @param array $source the original array where the search will be realized
 * @return void
 */
function array_keys_exist(array $keys, array $source): bool {

	foreach ($keys as $id => $key) {

		if (!array_key_exists($key, $source)) {

			return false;
		}
	}

	return true;
}

/**
 * Requires file and passes provided data
 * @param string $path The source of the file
 * @param mixed [$params] Data to pass into
 * @return void
 */
function get_file(string $path, $params = null)
{
	if (file_exists($path))
	{
		require_once($path);
  }
}

/*
 * Checks if entered arguments are equal
 * @param ...$args mixed arguments for comparison
 * @return bool Tru in case of equality, false on opposite case
 */
function equal(...$args): bool
{
	return(count(array_unique($args)) === 1);
}

/**
 * Includes files by the given paths
 * @param ArrayClass $paths The object within list of paths
 * @return void
 */
function multipleIncludes(ArrayClass $paths)
{
	while (!$paths->isEmpty())
	{
		$path = $paths->pull();

		require_once($path->value);
	}
}

/**
 * Insert the content of the files by the given paths
 * @param
 * @return string The textual data of the given files
 */
function multipleInsert(ArrayClass $paths): string
{
	$data = '';

	while (!$paths->isEmpty())
  {
		$path = $paths->pull();
		$data .= file_get_contents($path->value);
	}

	return $data;
}

/**
 * Capitalizes small words of the exploded expression
 * @param string $input The input explode-able text
 * @return string Capitalized text
 */
function sliceAndGlue(string $input, $delimiter = '_'): string
{
	$pieces = explode($delimiter, $input);

	array_walk($pieces, function(&$val, $key)
  {
		if (!is_array($val))
		{
      $val = ucfirst($val);
    }
	});

	$pieces = implode('', $pieces);

	return $pieces;
}

/**
	* @param bool $httpors Defines whether the REQUEST_SCHEME is HTTP (false) or HTTPS (true) ...
	* @param string $appdir The physical directory where the application is stored
	* @return string Returns url for the new project
	*/
function createurl(bool $httpors = false, string $appdir): string
{
	$scheme = $_SERVER['REQUEST_SCHEME'].(($httpors)? 's': '').'://';
	$appdir = implode('/', explode(DIRECTORY_SEPARATOR, $appdir));

	return $scheme.str_replace($_SERVER['DOCUMENT_ROOT'], $_SERVER['SERVER_NAME'], $appdir);
}

#
final class JSSerializedArray
{
	const Name = 'name';
	const Value = 'value';

	static function decode(array &$input)
  {
		$_ = array_shift($input);

		return(($_)? [$_[self::Name], $_[self::Value]]: false);
	}

	/**
	*
	* @param array &$input The reference of the given array
	* @param string $arraykey The key for sub-array recognition
	*
	* @return array Decoded array
	*/
	static function decodeAll(array &$input, string $arraykey): array
  {
		$a_ = [];

		while ($input)
    {
			$_ = array_shift($input);

			if ($_[self::Value])
			{
        $a_[$arraykey][self::Name] = $_[self::Value];
      }
		}

		return $a_;
	}
}

#
final class MD5Index
{
	const Source = 'src';
	const Alias = 'alias';

	/**
	 * Generates associative array within md5 keys of the values of the given array
	 * @param array $input In case if the input is associative array
	 * the values will be used, otherwise the input array is one dimensional
	 * @return array Access each entry by this principle
	 * e.g. we've [ 0 => 'some_text', ...] - md5('some_text') = 'asd9fs887a38s...';
	 * 'asd9fs887a38s...' => [
	 *		'alias' => 'someText',
	 *		'src' => e.g.
	 * ]
	 * each element of the input array
	 */
	static function encode(array $input): array
  {
		$out;
		$input = array_values($input);

		while ($input)
    {
			$_ = array_shift($input);
			$md5 = md5($_);
			$out[$md5] =
      [
				self::Alias => sliceAndGlue($_),
				self::Source => $_
			];
		}

		return $out;
	}

	/**
	 * Decodes already MD5Index-ed array back to its initial state
	 * @param array $md5input The encoded array
	 * @return array The decoded array
	 */
	static function decode(array $md5input): array
  {
		$out;

		while($md5input)
    {
			$_ = array_shift($md5input);
			$out[] = $_[self::Source];
		}

		return $out;
	}
}

/**
 * Something similar to the JSON
 * encode, decode into by using static methods
 */
class JSONic
{
	/**
	 * ex. encode([a => 1, b => 2], ',')
	 */
	static function encode(array $pairs, $deliemiter = ','): string
	{
		$result = null;

		array_walk_recursive($pairs, function(&$val, $key)
		{
			global $result;

			$result[] = self::pairEncode($key, $val);
		});

		return implode($delimiter, $result);
	}

	/**
	 * ex. decode(['a=1','a=2'], ',')
	 * @param mixed $pairs
	 */
	static function decode($pairs, $delimiter = ','): array
	{
		$pairs = explode($delimiter, $pairs);
		$decoded = null;

		while ($pairs)
		{
			$decoded[] = self::pairDecode(array_shift($pairs));
		}

		return $decoded;
	}

	static function pairEncode($key, $value): string
	{
		return sprintf('%s=%s', $key, $value);
	}

	static function pairDecode(string $pair): array
	{
		return explode('=', $pair);
	}
}
?>
