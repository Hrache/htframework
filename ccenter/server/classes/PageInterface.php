<?php
/**
 * Interface for pages
 * @author Max Pyger
 */
interface PageInterface {
	function meta();

	function resources();

	function header();

	function content();

	function footer();

	function docready();

	function bottomres();
}
?>