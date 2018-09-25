<?php
class SessionClass {
	private $sessionId;
	private $session;
	private $settings;
	function __construct(ArrayClass $settings) {
		$this->settings = $settings;
		$this->start();
		$this->session = &$_SESSION;
		if (!isset($_SESSION['id']) || ($_SESSION['id'] !== session_id())) {
			session_unset();
			session_regenerate_id();
		}
		$_SESSION['id'] = session_id();
	}
	function start(): SessionClass {
		if (!session_start($this->settings->item('start_options'))) {
			throw new Error('Session start error.');
		}
		return $this;
	}
	function reset() {
		session_reset();
		$this->start($this->settings->item('start_options'));
	}
	function close() {
		session_abort();
	}
	function getStoredSessionId() {
		return $_SESSION['id'];
	}
	function getCookie(...$key) {
		return StaticAClass::get($key, $_SESSION);
	}
	function setCookie(string $name, $value): SessionClass {
		$_SESSION[$name] = $value;
		return $this;
	}
	function cookieExists($index): bool {
		return array_key_exists($index, $_SESSION);
	}
	function exists(...$index): bool {
		$_ = new ArrayClass($_SESSION);
		return($_->exists($index));
	}
	function getSessionId(): string {
		return $this->sessionId;
	}
	function setSessionId(string $sessionId): SessionClass {
		$this->sessionId = $sessionId;
		session_id($this->sessionId);
		$_SESSION['id'] = $sessionId;
		return $this;
	}
	function reSetSessionId(): SessionClass {
		session_regenerate_id();
		return $this;
	}
	function &getSession(): array {
		return $_SESSION;
	}
	function get(...$key) {
		return StaticAClass::get($key, $_SESSION);
	}
	function add($key, $value): SessionClass {
		StaticAClass::add($key, $value, $_SESSION);
		return $this;
	}
	function del($key): SessionClass {
		StaticAClass::del($key, $_SESSION);
		return $this;
	}
}
?>