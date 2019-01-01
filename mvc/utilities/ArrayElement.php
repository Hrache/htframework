<?php
final class ArrayElement
{
	public $key;
	public $value;

	function __construct ($key = null, $value = null, &$byR = null)
	{
		$this->key = $key;
		$this->value = $value ?? $byR;
	}

	function toArray(): array
	{
		return (array) $this;
	}

	function getKey()
	{
		return $this->key;
	}

	function getValue()
	{
		return $this->value;
	}
}