<?php
final class PDOHelpersClass
{
	/**
	 * Generates PDO MySQL driver for connection within database selection
	 * @param string $host The name of the server host
	 * @param int|string $port The port number of the server
	 * @param string $db The name of the database
	 * @param string $charset The character-set of the database
	 * @return string The driver string
	 */
	static public function MySQLDriver(string $host, $port, string $db = '', string $charset = ''): string
	{
		return (sprintf('mysql:host=%s;port=%s;%s%s', $host, $port, $db? 'dbname='.$db.';': '', $charset? 'charset='.$charset: ''));
	}

	/**
	 * Generates PDO MySQL driver for connection within database selection
	 * @param string $host The name of the server host
	 * @param int|string $port The port number of the server
	 * @param string $db The name of the database
	 * @param string $charset The character-set of the database
	 * @return string The driver string
	 */
	static public function MSSQLDriver(string $host, $port, string $db = ''): string
	{
		return (sprintf('sqlsrv:Server=%s%s;%s', $host, $port? ','.$port: '', $db? 'Database='.$db: ''));
	}
}
?>