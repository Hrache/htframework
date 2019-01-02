<?php
class DatabaseClass
{
	const CLASS_MYSQL = "MySQLClass";
	const VENDOR = 0x114;

	const DBUSER = 'dbuser';
	const DBPASS = 'dbpass';
	const DBNAME = 'dbname';
	const DBHOST = 'host';
	const PORT = 'port';
	const SERVER = 'Server';
	const CHARSET = 'charset';
	const DATABASE = 'Database';

	const NOT_SUPPORTED_DATABASE_VENDOR_ERROR = 0x115;

	const VENDOR_MYSQL =  0x116;
	const VENDOR_SQLITE = 0x117;
	const VENDOR_MYSQLI = 0x118;
	const VENDOR_MSSQL = 0x119;
	const VENDOR_ORACLE = 0x120;

	protected $settings = null;
	protected $dbcon = null;
	protected $dbSettingsIndex = null;

	function __construct(ArrayClass $settings = null, $dbSettingsIndex = null)
	{
		$this->settings = $settings;
		$this->dbSettingsIndex = $dbSettingsIndex;
	}

	/**
	 * Destructor
	 * @return void
	 */
	function __destruct()
	{
		$this->settings = null;
		$this->dbcon = null;
	}

	/**
	 *
	 * @return
	 */
	function getSettings(): ArrayClass
	{
		return $this->settings;
	}

	/**
	 * Checks out connection status with database
	 * @return bool
	 */
	function connected()
	{
		return $this->dbcon;
	}

	/**
	 * Sets connection with various database types
	 * @return
	 */
	function &connect()
	{
		$dsn = '';
		$db = $this->settings->item(self::DBNAME);
		$port = $this->settings->item(self::PORT);

		switch ($this->settings->item(self::VENDOR))
		{
			case (self::VENDOR_MSSQL):
			{
				$dsn = $this->DSNMSSQL($db, $port); break;
			}
			case (self::VENDOR_MYSQL):
			{
				$dsn = $this->DSNMYSQL($db, $port); break;
			}
			default:
			{
				throw new ErrorException('', self::NOT_SUPPORTED_DATABASE_VENDOR_ERROR);
			}
		}

		$this->dbcon = new PDO($dsn,
			$this->settings->item(self::DBUSER),
			$this->settings->item(self::DBPASS)
		);

		return $this->dbcon;
	}

	private function DSNMSSQL(string $db = '', string $port = ''): string
	{
		return sprintf('sqlsrv:'.self::SERVER.'=%s%s;%s',
			$this->settings->item(self::SERVER),
			$port? ','.$port: '',
			$db? self::DATABASE.'='.$db: ''
		);
	}

	private function DSNMYSQL(string $db = '', string $port = ''): string
	{
		$charset = $this->settings->item(self::CHARSET);

		return sprintf('mysql:'.self::DBHOST.'=%s;%s%s%s',
			$this->settings->item(self::DBHOST),
			$port? self::PORT.'='.$port.';': '',
			$db? self::DBNAME.'='.$db.';': '',
			$charset? 'charset='.$charset: ''
		);
	}

	/*
	 * @param string $sql SQL query code
	 * @param int $pdo_fetch_type PDO class predefined constant for fetching
	 * @return mixed An array or other variable
	 */
	public function fetch(string $sql, int $pdo_fetch_type)
	{
		$res = $this->dbcon->query($sql);
		$res = $res->fetchAll($pdo_fetch_type);

		return $res;
	}

	/**
	 * Returns the list of supported vendors
	 * @return array The list of supported vendors
	 */
	static function DatabaseVendorsList(): array
	{
		$consts = (new ReflectionClass('DatabaseClass'))->getConstants();
		$vendor_keys = array_merge(preg_grep('/VENDOR_/m', array_keys($consts)), []);
		$keys_ = array_keys($consts);

		while ($keys_)
		{
			$_ = array_shift($keys_);

			if (!in_array($_, $vendor_keys))
			{
				unset($consts[$_]);
			}
		}

		unset($keys_, $vendor_keys);
		return $consts;
	}

	/**
	 * Returns the current connection to the database
	 * @return mixed
	 */
	function &getConn()
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