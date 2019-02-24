<?php
final class GlobalInit {
	function __construct() {
		define('ds', DIRECTORY_SEPARATOR);
		define('ps', PATH_SEPARATOR);

		/**
		 * @var string The directory of the project
		 */
		define('Server', Project.'server'.ds);
		define('Client', Project.'client'.ds);
		define('Files', Project.'files'.ds);
		define('Scripts', Server.'scripts'.ds);
		define('Languages', Server.'languages'.ds);
		define('Models', Server.'models'.ds);
		define('Snippets', Client.'snippets'.ds);

		/**
		 * Is used when async request have been made
		 * @var async
		 */
		define('Async', 'async');

		try {
			require_once(realpath(MVC.'/scripts/init.php'));
		}
		catch (Exception $e) {
			require_once(Project.'error.php');
		}
		catch (ErrorHandler $e) {
			require_once(Project.'error.php');
		}
	}
}
?>