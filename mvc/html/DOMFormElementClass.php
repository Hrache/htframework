<?php
class DOMFormElementClass extends DOMElementClass {
	const input_text = 'text';
	const input_password = 'password';
	const input_file = 'file';
	const input_radio = 'radio';
	const input_checkbox = 'checkbox';
	const input_submit = 'submit';
	const input_reset = 'reset';
	private $type = 'text';
	private $name = '';
	private $value = '';
	private $error = '';
	private $caption = '';
	private $desc = '';
	private $specs = '';
	function __construct(string $type, string $name, string $value, string $error = '', string $caption = '', string $desc = '', string $specs = '') {
		switch ($type) {
			case (parent::form_select): {
				$this->setClosed(true);
				$this->setTag(parent::form_select);
				break;
			}
			case (parent::form_textarea): {
				$this->setTag(parent::form_textarea);
				$this->setClosed(true);
				break;
			}
			default: {
				$this->setTag(parent::form_input);
			}
		}
		$this->type = $type;
		$this->name = $name;
		$this->value = $value;
		$this->setAttributes([
			'type' => $this->type,
			'name' => $this->name,
			'value' => $this->value
		]);

		parent::__construct ( $this->getTag (), '', $this->getClosed () );
	}
	function getAttributes() {
		return $this->attributes;
	}
	function getError() {
		return $this->error;
	}
	function getCaption() {
		return $this->caption;
	}
	function getDesc() {
		return $this->desc;
	}
	function getSpecs() {
		return $this->specs;
	}
	function setAttributes($attributes) {
		$this->attributes = $attributes;
	}
	function setError($error) {
		$this->error = $error;
	}
	function setCaption($caption) {
		$this->caption = $caption;
	}
	function setDesc($desc) {
		$this->desc = $desc;
	}
	function setSpecs($specs) {
		$this->specs = $specs;
	}
}
?>