<?php
/**
 * @var bool The project's state: development (false) or production (true)
 */
define('ProjectState', false);

/**
* @var string Project's directory
*/
define('Project', dirname(__FILE__).DIRECTORY_SEPARATOR);

/**
 * @var string The physical path of the framework
 */
define('MVC', realpath(dirname(__DIR__).'/mvc').DIRECTORY_SEPARATOR);

require_once(MVC.'core.php');
?>