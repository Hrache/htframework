<?php
/**
	* Requiring "functons.php" built-in library of functons
	* independent functions
	*/
require_once(__DIR__.'\\scripts\\functions.php');

/**
	* Loading the core sub-library
	*/
lib_load('core');

/**
	* Creating an instance of GlobalInit class
	* The response initialization point
	*/
new GlobalInit();
?>