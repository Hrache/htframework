<?php
/**
	* Description of LinkClass
	* @author Max Pyger
	*/
class LinkClass {
	protected $getParams;

	function __construct(string $getParams = null) {
		$this->getParams = explode('?', $getParams);
		$_ = array_pop($this->getParams);
		if ($_) {
			$_ = explode('&', $_);
			$this->getParams = array_merge($this->getParams, $_);
		}

		unset($_);
	}

	static function queryString(array $dataMap): string {
		$str = '';
		$array = new ArrayClass($data);
		while (!$array->isEmpty()) $str .= implode('&', [$str, implode('=', $array->pull(false))]);

		return $str;
	}
}