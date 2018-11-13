<?php
final class SQLClass
{
	protected $mssql = null;
	protected $result = null;
	protected $settings = null;
	const PDO_FETCH_COLUMN = 0;
	const PDO_FETCH_OBJECT = 1;
	const PDO_FETCH_DEFAULT = 2;
	const DBUSER = 'dbuser';
	const DBPASSWORD = 'dbpass';
	const DBHOST = 'dbhost';
	const DBPORT = 'dbport';
	const DBNAME = 'dbname';
	const DBCHARSET = 'dbchar';

	function __construct(ArrayClass $settings, bool $nodb = false)
	{
		$this->settings = $settings;
		$this->mssql = new PDO(
			$this->pdo_sql_driver(
				$settings->item(self::DBHOST),
				$settings->item(self::DBNAME)
			),
			$settings->item(self::DBUSER),
			$settings->item(self::DBPASSWORD)
		);
	}

	public function connection(): PDO
	{
		return $this->mssql;
	}

	/**
	 * Generates PDO MSSQL driver for connection within database selection
	 * @param string $server The name of the server host
	 * @param string $db The name of the database
	 * @return string The driver string
	 */
	private function pdo_sql_driver(string $server, string $db): string
	{
		return(sprintf('sqlsrv:Server=%s;Database=%s;', $server, $db));
	}
	
	/**
	 * @param string $query_s
	 * @param int $fetchType One of the constants that decides the type of the fetching
	 * @param bool $object The return type - object or array (by default true: object)
	 * @return mixed (ArrayClass | array)Fetched and collected into array data from PDOStatement
	 */
	function PDOFetchArray(string $query_s, int $fetchType = 0, bool $object = true)
	{
		$this->query($query_s);

		$arr = new ArrayClass();
		$i = $this->result->rowCount();

		while ($i--)
		{
			if ($fetchType === self::PDO_FETCH_COLUMN)
			{
				$arr->add($i, $this->result->fetchColumn());
			}
			elseif ($fetchType === self::PDO_FETCH_OBJECT)
			{
				$arr->add($i, $this->result->fetchObject());
			}
			else
			{
				$arr->add($i, $this->result->fetch());
			}
		}

		return ($object)? $arr : $arr->input;
	}
	
	function query(string $queryString): SQLClass
	{
		$this->result = $this->mysql->query($queryString);

		return $this;
	}
	
	/**
	 * By using $query string does result fetching after querying
	 * @param string $query
	 * @param bool $all Means fetch all or no (by default true)
	 * @param bool $object Return type object or array (by default true)
	 * @param int $fetch_type PDO::fetch_type The type of the fetch
	 * @return mixed
	 */
	function fetch(string $query = '', bool $all = true, bool $object = true)
	{
		$this->query($query);
		
		$fetched = null;
		
		if ($all)
		{
			$fetched = $this->result->fetchAll();

			if ($object)
			{
				$fetched = new ArrayClass($fetched);
			}
		}
		
		$resultArray = ($all) ? $fetched: $this->result->fetch();

		unset($fetched);

		if (!$resultArray)
		{
			return [];
		}

		$typeOfTheResult = gettype($resultArray);

		if ($typeOfTheResult === 'ArrayClass')
		{
			if ($resultArray->length(1))
			{
				$resultArray = $resultArray->item(0);
			}
		}
		elseif ($typeOfTheResult === 'array')
		{
			if (count($resultArray) === 1)
			{
				$resultArray = $resultArray[0];
			}
		}

		unset($typeOfTheResult);

		return $resultArray;
	}
	
	function boolQuery(string $query): bool
	{
		return boolval($this->mysql->exec($query));
	}

	function getResult(): PDOStatement
	{
		return $this->result;
	}

	function close(): bool
	{
		$this->mysql = null;

		return(!$this->mysql ? true : false);
	}
}
?>
