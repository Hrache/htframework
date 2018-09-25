<?php
class DatabaseClass
{
	const CLASS_MYSQL = "MySQLClass";
	const MYSQL = 0;
	const SQLITE = 1;
	const MYSQLI = 2;
	const DBTYPE = 0x114;
	protected $settings = null;
	protected $dbcon = null;
	protected $dbSettingsIndex = null;
	function __construct(ArrayClass $settings = null, $dbSettingsIndex = null)
	{
		$this->settings = $settings;
		$this->dbSettingsIndex = $dbSettingsIndex;
	}
	function __destruct()
	{
		unset($this->settings, $this->dbcon);
	}
	function getSettings(): ArrayClass
	{
		return $this->settings;
	}
	/**
		* Checks out whether are we have connection with
		* the database or no
		* @return bool
		*/
	function connected(): bool
	{
		return boolval($this->dbcon);
	}
	/**
		* Sets connection with various database types
		* @return
		*/
	function connect()
	{
		switch ($this->settings->item(self::DBTYPE)):
			case (self::MYSQLI):
				$this->dbcon = new MySQLiClass($this->settings);
				break;
			case (self::MYSQL):
			default:
				$this->dbcon = new MySQLClass($this->settings);
		endswitch;
		if ($this->connected())
		{
			$this->settings = null;
		}

		return $this->dbcon;
	}

	/**
		* Returns the current connection to the database
		* @return mixed
		*/
	function getConn()
	{
		return $this->dbcon;
	}

	/**
		* Changes the database
		* @param ArrayClass $settings Settings of the new database connection
		* @return DatabaseClass
		*/
	function setSettings(ArrayClass $settings): DatabaseClass
	{
		$this->settings = $settings;
		return $this;
	}

	/**
		* Alias for self::setSettings
		*/
	function changeDatabase(ArrayClass $settings): DatabaseClass
	{
		$this->settings = $settings;
		return $this;
	}
	function getDbSettingsIndex()
	{
		return $this->dbSettingsIndex;
	}
}
?>
