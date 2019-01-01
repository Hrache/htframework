<?php
/*register_shutdown_function(function()
{
	$_SERVER['QUERY_STRING'] = $_SERVER["REQUEST_URI"]."\/".rand(100000,999999);
});*/
/**
 * @var bool The project's state: developement(false) or production(true)
 */
define('ErrorState', false);

/**
* @var string Project's directory
*/
define('Project', dirname(__FILE__).DIRECTORY_SEPARATOR);

/**
 * @var string The physical path of the framework
 */
define('MVC', Project.'mvc'.DIRECTORY_SEPARATOR);

require_once(MVC.'core.php');
?>