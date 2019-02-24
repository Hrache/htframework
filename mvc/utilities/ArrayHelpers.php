<?php
class ArrayHelpers {
	private $_array;

	function __construct(array $_array) {
		$tmparray = $_array;
		$this->_array = &$tmparray;
		unset($_array);
	}

	/**
	 * Description of deleteByIds
	 * @param int | string any quantity of indexes that are desired to be removed
	 **/
	function deleteByIds(...$ids): ArrayHelpers {
		foreach ($ids as $item) {
			if (isset($this->_array[$item])) {
				unset($this->_array[$item]);
			}
		}

		return $this;
	}

	function get_array(): array {
		return $this->_array ?? [];
	}

	function set_array($_array): ArrayHelpers {
		$this->_array = $_array; return $this;
	}

	function getItem($index) {
		return(array_key_exists($index, $this->_array)? $this->_array [$index] : $index);
	}

	function setItem($index, $value): ArrayHelpers {
		$this->_array[$index] = $value; return $this;
	}

	function _item($index) {
		return array_key_exists($index, $this->_array);
	}

	function append($index = null, $value): ArrayHelpers {
		if (is_null($index)) {
			$this->_array[] = $value;
		}
		else {
			$this->_array[$index] = $value;
		}

		return $this;
	}

	static function getLastItem(Array &$arrayItems) {
		return $arrayItems[count($arrayItems) - 1];
	}

	function onlyKeys(): array {
		return array_keys($this->_array);
	}

	function onlyValues(): array {
		return array_values($this->_array);
	}

	/**
	 * Description of isLast
	 * @param array $ar          stack
	 * @param mixed $keyOrValue  needle ( index or value)
	 * @return bool true in case of last, false in opposite case
	 **/
	static function isLast(array $ar, $keyOrValue): bool {
		$arrayLength = count($ar);

		if (intval($keyOrValue) === $arrayLength - 1) {
			return true;
		}

		if ($ar[$arrayLength - 1] === $keyOrValue) {
			return true;
		}

		return false;
	}
}
?>