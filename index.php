<?php

/**
 * @var string The physical path of the web-site
 */
define('Project', dirname(__FILE__) . DIRECTORY_SEPARATOR);

/**
 * @var string The physical path of the framework
 */
define('MVC', realpath(dirname(Project) . '/hrachmvc/mvc') . DIRECTORY_SEPARATOR);

require_once(MVC . 'core.php');
?>