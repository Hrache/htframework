<?php
final class ArrayElement {
	public $key;
	public $value;
	public function __construct ($key = null, $value = null, &$byR = null) {
		$this->key = $key;
		$this->value = $value ?? $byR;
	}
	public function toArray(): array {
		return (array) $this;
	}
	public function getKey() {
		return $this->key;
	}
	public function getValue() {
		return $this->value;
	}
}