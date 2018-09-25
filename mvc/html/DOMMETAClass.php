<?php
class DOMMETAClass extends DOMElementClass {
	const text_html = 'text/html';
	const text_css = 'text/css';
	const image_png = 'image/png';
	const image_jpeg = 'image/jpeg';
	const image_any = 'image/*';
	const video_mpeg = 'video/mpeg';
	const audio_basic = 'audio/basic';
	private $name;
	private $content;
	private $scheme;
	private $http_equiv;
	function __construct ( string $name, string $content, string $schema, string $http_equiv) {
		$this->name = $name;
		$this->content = $content;
		$this->schema = $schema;
		$this->http_equiv = $http_equiv;
		$this->setAddAttributes ([
			'name' => $this->name,
			'content' => $this->content,
			'schema' => $this->schema,
			'http_equiv' => $this->http_equiv,
		]);
		parent::__construct ( DOMElementClass::_meta);
	}
	function getName () {
		return $this->name;
	}
	function getContent () {
		return $this->content;
	}
	function getScheme () {
		return $this->scheme;
	}
	function getHttp_equiv () {
		return $this->http_equiv;
	}
	function setName ( $name) {
		$this->name = $name;
	}
	function setContent ( $content) {
		$this->content = $content;
	}
	function setScheme ( $scheme) {
		$this->scheme = $scheme;
	}
	function setHttp_equiv ( $http_equiv) {
		$this->http_equiv = $http_equiv;
	}
}
?>