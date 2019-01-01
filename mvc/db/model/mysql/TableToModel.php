<?php
class TableToModel
{
	const field_length = 'length';
	/**
		* Constructor for TableToModel class
		* @param string $filePath Path where file/s will be created
		* @param MySQLClass $mysql MySQL PDO connection
		* @param mixed $tables The list of the names of the desired tables
		* for model class creation
		*/
	public function __construct(string $filePath, MySQLClass $mysql, string ...$tables)
	{
		// SHOW ALL TABLES
		$tables_q = 'SHOW FULL TABLES;';
		$tables_qr = $mysql->PDOFetchArray($tables_q, MySQLClass::PDO_FETCH_COLUMN);
		$tables_qr = $tables_qr->input;

		foreach ($tables_qr as $id => $name)
		{
			if ($tables && (!in_array($name, $tables) || !$name))
			{
				continue;
			}

			$desc_q = sprintf('DESCRIBE %s;', $name);
			$desc_qr = $mysql->PDOFetchArray($desc_q, MySQLClass::PDO_FETCH_DEFAULT)->input;
			
			if (!is_array($desc_qr))
			{
				continue;
			}
			
			$modelInheritance = self::modelInheritance(ucfirst($name));
			$properties = self::createProperties($desc_qr);
			$content = self::modelFinalizer($name, $modelInheritance, $properties);
			
			self::varnameDesigner($name);
			self::renderModelFile($filePath . DIRECTORY_SEPARATOR . $name . 'Model.php', $content);
		}

		unset($tables_q, $tables_qr);
	}

	/**
		* After getting the info of the individual mysql table
		* by using "describe" mysql-command this method below
		* generates appropriate list of properties, constants for the
		* observable model
		* @param array $tbl_desc The result of 'describe' mysql-command for individual mysql table
		* @return string
		*/
	public static function createProperties(array $tbl_desc): string
	{
		$rules = $properties = $constants = $enums_ = '';
		$rules = PHP_EOL . '	const rules = [%s' . PHP_EOL . '	];';
		$rules_items = '';

		foreach ($tbl_desc as $i => $val)
		{
			if (is_array($val))
			{
				$constants .= PHP_EOL . '	const ' . $val[MySQLField::tbl_field] . ' = \'' . $val[MySQLField::tbl_field] . '\';';
				$matches = [];
				$rules_item = '';
				$type_parts = explode(' ', $val[MySQLField::tbl_type]);
				$type = explode('(', $type_parts[0]);
				$type_extra = $type_parts[1] ?? '';
				$rules_item .= sprintf(PHP_EOL . "			'" . ValidationClass::VALIDATION_TYPE_MYSQL . "' => '%s',", $type[0]);
				$rules_item .= sprintf(PHP_EOL . "			'" . ValidationClass::VALIDATION_NULL_MYSQL . "' => '%s',", $val[2]);
				$enum = strripos($type_parts[0], 'enum');

				if ($enum !== false)
				{
					$rules_item .= sprintf(PHP_EOL . "			'" . ValidationClass::VALIDATION_ENUM_MYSQL . "' => array%s,", substr($type_parts[0], 4));
				}

				if (preg_match('/\d+/i', $type_parts[0], $matches) && $enum === false)
				{
					$rules_item .= sprintf(PHP_EOL . "			'" . ValidationClass::VALIDATION_LENGTH_MYSQL . "' => '%s',", $matches[0]);
					$matches = null;
				}

				$rules_item .= sprintf(PHP_EOL . "			'" . ValidationClass::VALIDATION_EXTRA_MYSQL . "' => '%s',", $type_extra);
				$rules_item .= sprintf(PHP_EOL . "			'" . ValidationClass::VALIDATION_DEFAULT_MYSQL . "' => '%s',%s", $val[MySQLField::tbl_default], PHP_EOL);
				$rules_items .= sprintf(PHP_EOL . '		self::%s => [%s		],', $val[MySQLField::tbl_field], $rules_item);
				$properties .= PHP_EOL . '	// ' . $val[MySQLField::tbl_type];
				$properties .= sprintf(PHP_EOL . '	protected $%s', $val[MySQLField::tbl_field]);
				$properties .= /* (empty($val[MySQLField::tbl_default])? '' : ' = \'' . $val[MySQLField::tbl_default] . '\'') . */';' . PHP_EOL;
			}
		}

		return ($constants . sprintf($rules, $rules_items) . PHP_EOL . $properties);
	}
	/**
		* Generates the class inheritance text
		* @param string $modelName Desired name of the model
		* @param string $extends Name of the parent class
		* @param string $implements If will be iterface then the name of interface
		* @return string
		*/
	static function modelInheritance(string $modelName, string $extends = 'MySQLModelAbstract', string $implements = ''): string
	{
		$modelName .= 'Model';
	
		self::varnameDesigner($modelName);
	
		$extends = ($extends ? 'extends ' . $extends . ' ' : '');
		$implements = (!$extends && $implements) ? 'implements ' . $implements : '';
		$data = sprintf('class %s %s %s', $modelName, $extends, $implements);
	
		return $data;
	}

	/**
		* Makes the name of the variable nicely capitalized without underscores
		* e.g. tbl_hello_site - TblHelloSite this method was designed mostly for
		* model name from database which may have pre/postfixes
		* @param string $varName Desired name of the model
		* @return void works with argument given by reference
		*/
	static function varnameDesigner(string &$varName): void
	{
		$varName = explode('_', $varName);

		array_walk($varName, function (&$val, $key)
		{
			$val = ucfirst($val);
		});

		$varName = implode('', $varName);
	}

	/**
		* Creates the code of the model class-file this method
		* gathers the all information that was generated by the
		* other methods (TableToModel::createProperties, TableToModel::$modelInheritance)
		* @param string $modelName
		* @param string $modelInheritance
		* @param string $properties
		* @return string The text of the model class file
		*/
	static function modelFinalizer(string $modelName, string $modelInheritance, string $properties): string
	{
		$data = <<<EOD
<?php
$modelInheritance
{
	use ModelsTrait;
	const MODEL = '$modelName';$properties

	function __construct(array \$modelData = [])
	{
		parent::__construct(self::MODEL, \$modelData);
	}
}
?>
EOD;

		return $data;
	}

	/**
		* Creates the model's class-file within given code-text
		* @param string $path The full filepath ( within filename) of the model's class-file
		* @param mixed $content The code-text of the model
		* @return void
		*/
	static function renderModelFile(string $path, $content = ''): void
	{
		$fres = fopen($path, 'w', false);

		if (fclose($fres))
		{
			file_put_contents($path, $content);
		}
	}

	/**
		*
		* @param string $id
		*        	by default null
		* @return string if $id is not null, by default array
		*         of MySQL datatypes for v.10.1.16-MariaDB
		*/
	static function fieldType(string $id = '')
	{
		$mysqlType =
		[
			'real',
			'tinyint',
			'smallint',
			'mediumint',
			'int',
			'bigint',
			'bit',
			'float',
			'double',
			'decimal',
			'char',
			'varchar',
			'nvarchar',
			'tinychar',
			'text',
			'mediumtext',
			'tinytext',
			'longtext',
			'json',
			'binary',
			'varbinary',
			'tinyblob',
			'blob',
			'mediumblob',
			'longblob',
			'point',
			'linestring',
			'polygon',
			'geometry',
			'multipoint',
			'multilinestring',
			'multipolygon',
			'geometrycollaction',
			'date',
			'time',
			'year',
			'datetime',
			'timestamp',
			'enum',
			'set'
		];

		if (boolval($id) && isset($mysqlType [$id]))
		{
			return $mysqlType [$id];
		}
		else
		{
			return $mysqlType;
		}
	}

	/**
		* Generetes array of the validation options for the given table
		*/
	static function validationOptions() {}
}
?>