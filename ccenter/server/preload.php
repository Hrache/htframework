<?php
define('Classes', Server.'classes'.DIRECTORY_SEPARATOR);

set_include_path(get_include_path().PATH_SEPARATOR.Classes);

lib_load('html');

require_once('user_functions.php');
?>