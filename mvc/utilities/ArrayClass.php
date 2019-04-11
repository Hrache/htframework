<?php
class StaticAClass {
	/*
	 * @param mixed|array $key
	 * @param mixed $value
	 * @param array &$array
	 */
	static function add($key, $value, array &$array) {
		if (is_array($key)) eval(ArrayClass::keyIndexCode('array', $key).'=$value;');
		else {
			if ($key) $array[$key] = $value;
			else $array[] = $value;
		}
	}

	/**
	 * @param mixed|array $key
	 * @param array &$array
	 */
	static function del($keys, array &$array) {
		while ($keys) {
			$k = array_shift($keys);
			if (is_array($k)) {
				$isset = false;
				$code = ArrayClass::keyIndexCode('array', $k);
				eval('$isset=isset('.$code.');');

				if ($isset) eval('unset('.$code.');');
			}
			elseif (isset($array[$k])) unset($array[$k]);
		}
	}

	/*
	 * @param mixed|array $index
	 * @param array &$array
	 */
	static function get($index, array &$array) {
		if (is_array($index)) {
			$isset = false;
			$code = ArrayClass::keyIndexCode('array', $index);
			eval('$isset=isset('.$code.');');

			if ($isset) {
				eval('$code='.$code.';');

				return $code;
			}
		}
		elseif (isset($array[$index])) return $array[$index];
	}
}

class ArrayClass {
	/**
	 * @var mixed The input array
	 */
	public $input;

	/**
	 * The constructor function of the ArrayClass object
	 * @param mixed $inputArray The array of data
	 * @param array &$byRef The array that is given by the reference
	 * @return void
	 */
	function __construct(array $input = []) {
		$this->input = $input;
	}

	function __destruct() {
		if ($this->length(0)) unset($this->input);
	}

	function &getByRInput() {
		return $this->input;
	}

	/**
		* @param string $nameOfTheArray The name of the real array (maybe even this->input)
		* @param array $key The array of the keys that is the path to the desired element
		* @return string The text of the desired array element for evaluation
		*/
	static function keyIndexCode(string $nameOfTheArray, array $key): string {
		$__ = '';
		while($key) {
			$k = array_shift($key);
			if (is_array($k)) {
				$key = $k;
				$__ = '';
			}
			else {
				$k = is_string($k)? '\''.$k.'\'': $k;
				$__ .= "[$k]";
			}
		}

		return('$' . $nameOfTheArray . $__);
	}

	function setByRInput(array &$input) {
		$this->input = $input;
	}

	/**
	 * Returns the last element of the array
	 * @return stdClass an instance of stdClass containing 2 properties
	 * key and value ([$obj]->key, [$obj]->value)
	 */
	function pop(): ArrayElement {
		$key = array_pop(array_keys($this->input));
		return new ArrayElement($key, array_pop($this->input));
	}

	/**
	 * Gets any element from the array and removes it from
	 * @param mixed ...$key The path to the desired element
	 * @return mixed Null in case of absence of the desired element
	 */
	function grab(...$key): ArrayElement {
		$isset = false;
		$code = $this->keyIndexCode('this->input', $key);
		eval('$isset = isset('.$code.');');

		if ($isset) {
			eval('$code='.$code.';');

			$aCopy = new ArrayElement(null, $code);
			$this->del($key);

			return $aCopy;
		}
		else return null;
	}

	/**
	 * Returns the 1st element of the array by removing it from the array
	 * @params bool $obj Decides whether returned data is stdClass object
	 * or an array that consists of a single key/value pair
	 * @return mixed An instance of ArrayElement or an array
	 */
	function pull(bool $obj = true) {
		$i = array_keys($this->input);
		$key = array_shift($i);
		unset($i);

		return($obj? new ArrayElement($key, array_shift($this->input)): [$key => array_shift($this->input)]);
	}

	function append(array ...$arrays): ArrayClass {
		while ($arrays) {
			$arr = array_shift($arrays);
			$this->input = array_merge($this->input, $arr);
		}

		return $this;
	}

	/**
		* For multi-dim arrays appropriately given order of keys
		* will be the path of desired element, in case if only one
		* key is given, the method will act as "accessor" for one element
		* for the arrays
		* @param mixed $index Key/key-path of the element in the array, may contain arrays
		* which are separate elemets in the main array
		* @return mixed the desired value, null if no such element
		*/
	function item(...$index) {
		if ($index) {
			$len = 0;
			while ($len < count($index)) {
				if (is_array($index[$len])) $index = $index[$len];

				$len++;
			}

			unset($len);
		}

		$isset = false;
		$code = $this->keyIndexCode('this->input', $index);
		eval('$isset=isset('.$code.');');

		if ($isset) {
			eval('$code='.$code.';');

			return $code;
		}
	}

	/**
	 * 1st argument there may be array or any other single allowed key.
	 * In case of array the elements of the $key is the path to the
	 * element in the multidimensional array, if $key isn't array
	 * then we have new root level element
	 * @param mixed $key Key of the element in the array
	 * @param mixed $value A new value for the element
	 * @return ArrayClass The same instance of the object for future
	 * chaining of the methods
	 */
	function add($key, $value): ArrayClass {
		if (is_array($key)) eval($this->keyIndexCode('this->input', $key).'=$value;');
		elseif ($key || $key === 0) $this->input[$key] = $value;
		else $this->input[] = $value;

		return $this;
	}

	/**
	 * Deletes the element by the given argument.
	 * @param mixed ...$keys The elements that are given as a single key
	 * or index are for one dimensional array
	 * (function (...$keys) e.g. function ('dff', 1, '233')),
	 * those that are given as a arrays are for multidimensional arrays
	 * (function (...$keys) e.g. function ('dff', 1, ['233', 10, 11, 24], '234')),
	 * @return ArrayClass The same instance of the object for future
	 * chaining of the methods
	 */
	function del(...$keys): ArrayClass {
		while ($keys) {
			$k = array_shift($keys);
			if (is_array($k)) {
				$isset = false;
				$code = $this->keyIndexCode('this->input', $k);
				eval('$isset = isset('.$code.');');

				if ($isset) eval('unset('.$code.');');
			}
			elseif (isset($this->input[$k])) unset($this->input[$k]);
		}

		return $this;
	}

	function replaceArray(array $newArray): ArrayClass {
		$this->input = $newArray;
		return $this;
	}

	function eachItem(callable $function = null): bool {
		return array_walk_recursive($this->input, $function);
	}

	function inputArray(bool $stdClass = false) {
		return $stdClass? (object) $this->input : $this->input;
	}

	function dump(bool $exit = false): ArrayClass {
		printf('<pre>%s</pre>' . PHP_EOL, print_r($this->input, true));

		!$exit || die();

		return $this;
	}

	/**
	 * Checks wheather the element in the array does exist or no
	 * @param int|&string ...$keys The right sequence of
	 * the element in the array
	 * @return bool TURE if exists, FALSE if not
	 */
	function exists(...$keys): bool {
		$code = $this->keyIndexCode('this->input', $keys);
		$isset = false;
		eval('$isset = isset('.$code.');');

		return $isset;
	}

	/**
	 * Returns the length of the array or does length-comparison
	 * in between given number and the length of the array
	 * @param int $equals user provided length to be compared with
	 * @return int by default the length of the array, in case of
	 * argument different than null, return 1 or 0 by depending on
	 * the result of the comparison
	 */
	function length(int $equals = -1): int {
		switch ($equals)		{
			case (-1): return count($this->input);
			default: return ((count($this->input) === $equals) ? 1 : 0);
		}
	}

	/**
	 * Returns the 1st non-empty element of the array
	 * @param mixed user desired random arguments for being processed
	 * @return mixed
	 */
	static function nonEmpty() {
		$ar = array_unique(func_get_args());
		while ($ar) {
			$i = array_shift($ar);
			if ($i) return $i;
		}

		return '';
	}

	/**
	 * Returns JSON encoded variant of the input array
	 * @return string - JSON string of the input array
	 */
	function json(): string {
		return json_encode($this->input);
	}

	/**
	 * Description of isEmpty()
	 * checks whether the array is empty or no
	 * @return bool if empty true else false
	 */
	function isEmpty(): bool {
		return boolval($this->length(0));
	}

	function iterate() {
		self::arrayDepthIterator($this->input);
	}
}
?>