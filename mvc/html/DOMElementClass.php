<?php
class DOMElementClass {
	const _html = 'html';
	const _head = 'head';
	const _title = 'title';
	const _meta = 'meta';
	const _style = 'style';
	const _script = 'script';
	const _link = 'link';
	const _a = 'a';
	const _div = 'div';
	const _pre = 'pre';
	const _blockquote = 'blockquote';
	const _p = 'p';
	const _span = 'span';
	const _form = 'form';
	const _ul = 'ul';
	const _li = 'li';
	const _input = 'input';
	const _textarea = 'textarea';
	const _select = 'select';
	const _option = 'option';
	const _label = 'label';
	const _br = 'br';
	const _hr = 'hr';
	private $tag = '';
	private $id = '';
	private $class = '';
	private $addAttributes = [];
	private $closed = false;
	private $data = '';
	private $_html_;
	private $open_tags = array (
		self::_br => true,
		self::_hr => true,
		self::_link => true,
		self::_meta => true,
		self::_input => true
	);
 function __construct ( string $tag, string $data = '') {
		if (!array_key_exists($tag, $this->open_tags)) {
			$this->closed = true;
		}
		$this->data = $data;
		$this->_tag();
	}
 /**
	* Description of _tag_
	* generates any type of html tag by given arguments
	*
	* @param string $tag - name of HTML element tag
	* @param string $id - id attr of dom element
	* @param string $class - class attr of dom element
	* @param bool $closed - whether is the tag closed or no
	* @param array $add_attrs the associative array of additional attrs for dom element
	* @param string $data if the dom element isn't closed then $data will be wrapped by it
	*
	* @return string - representation of the string element
	*/
	static function _tag_(string $tag, string $id = '', string $class = '', string $data = '', bool $closed = false, array $add_attrs = []): string {
		$_attrs = ($id !== '')? ' id="$id"': '';
		$_attrs .= ($class !== '')? ' class="$class"': '';
		if ($add_attrs):
			foreach ($add_attrs as $attr => $value):
				$_attrs .= sprintf(' %s="%s"', $attr, $value);
			endforeach;
		endif;
		return sprintf('<%s %s%s%s'.PHP_EOL, $tag, $_attrs, ($closed)? '>' : ' />', ($closed)? sprintf('%s</%s>', $data, $tag) : '');
	}
	/**
	 * Description of _tag
	 * the same function as the _tag_ is, but none static variant of it
	 *
	 * @return DOMElementClass - for method chaining
	 **/
	function _tag(): DOMElementClass {
		$this->_html_ = self::_tag_($this->tag, $this->id, $this->class, $this->data, $this->closed, $this->addAttributes);
		return $this;
	}
	function getId() {
		return $this->id;
	}
	function setId($id) {
		$this->id = $id;
	}
	function getData() {
		return $this->data;
	}
	function setData($data) {
		$this->data = $data;
	}
	function getClass() {
		return $this->class;
	}
	function getTag() {
		return $this->tag;
	}
	function setClass($class) {
		$this->class = $class;
	}
	function setTag($tag) {
		$this->tag = $tag;
	}
	function getAddAttributes() {
		return $this->addAttributes;
	}
	function getClosed() {
		return $this->closed;
	}
	function get_html_() {
		return $this->_html_;
	}
	function setAddAttributes($addAttributes) {
		$this->addAttributes = $addAttributes;
	}
	function setClosed($closed) {
		$this->closed = $closed;
	}
	function set_html($_html_) {
		$this->_html_ = $_html_;
	}
}
?>