<?php
class MSSQLTableToModel {
	/**
	 * Constructor for TableToModel class
	 * @param string $filePath Path where file/s will be created
	 * @param PDO $sqlcon MSSQL PDO connection
	 * @param mixed $tables The list of the names of the desired tables
	 * for model class creation
	 */
	public function __construct(string $filePath, PDO $sqlcon, ...$tables) {
		// SHOW ALL TABLES
		$tables_qr = $sqlcon->query("SELECT [TABLE_NAME] FROM [armcarshop].[INFORMATION_SCHEMA].[TABLES] WHERE [TABLE_NAME]<>'sysdiagrams';");
		$tables_qr = $tables_qr->fetchAll(PDO::FETCH_ASSOC);
		while ($tables_qr) {
			$name = array_shift($tables_qr)['TABLE_NAME'];
			if ($tables && !in_array($name, $tables))continue;

			$desc_qr = $sqlcon->query(sprintf("SELECT [COLUMN_NAME], [IS_NULLABLE], [DATA_TYPE], [CHARACTER_MAXIMUM_LENGTH], [COLUMN_DEFAULT], [CHARACTER_SET_NAME] FROM [armcarshop].[INFORMATION_SCHEMA].[COLUMNS] where [TABLE_NAME]='%s';", $name));
			$desc_qr = $desc_qr->fetchAll(PDO::FETCH_ASSOC);
			if (!is_array($desc_qr)) continue;

			$modelInheritance = self::modelInheritance(ucfirst($name));
			$properties = self::createProperties($desc_qr);
			$content = self::modelFinalizer($name, $modelInheritance, $properties);
			self::varnameDesigner($name);

			self::renderModelFile($filePath . DIRECTORY_SEPARATOR . $name . 'Model.php', $content);
		}

		unset($tables_qr);
	}

	/**
	 * After getting the info of the individual mysql table
	 * by using "describe" mssql-command this method below
	 * generates appropriate list of properties, constants for the
	 * observable model
	 * @param array $tbl_desc The result of 'describe' mssql-command for individual mssql table
	 * @return string
	 */
	static function createProperties(array $tbl_desc): string {
		$tableColumns = (new ReflectionClass('MSSQLTableClass'))->getConstants();
		$columns = [];
		while ($tbl_desc) {
			$desc = array_shift($tbl_desc);
			$colname = $desc[MSSQLTableClass::COLUMN_NAME];
			$desc = var_export($desc, true);
			$_ = preg_replace("/(^\ {2})/m", "\t", "const $colname = $desc;");
			$columns[] = preg_replace('/^/m', "\t", $_);
		}

		return implode(PHP_EOL.PHP_EOL, $columns).PHP_EOL;
	}

	/**
	 * Generates the class inheritance text
	 * @param string $modelName Desired name of the model
	 * @param string $extends Name of the parent class
	 * @param string $implements If will be iterface then the name of interface
	 * @return string
	 */
	static function modelInheritance(string $nameOfTheTable, string $extends = '', string $implements = ''): string {
		$nameOfTheTable .= 'Model';
		self::varnameDesigner($nameOfTheTable);

		$extends = $extends ? 'extends ' . $extends : '';
		$implements = (!$extends && $implements) ? ' implements ' . $implements : ' ';
		return sprintf('class %s%s%s', $nameOfTheTable, $extends, $implements);
	}

	/**
	 * Makes the name of the variable nicely capitalized without underscores
	 * e.g. tbl_hello_site - TblHelloSite this method was designed mostly for
	 * model name from database which may have pre/postfixes
	 * @param string $varName Desired name of the model
	 * @return void works with argument given by reference
	 */
	static function varnameDesigner(string &$varName): void {
		$varName = explode('_', $varName);
		array_walk($varName, function (&$val, $key) {
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
	static function modelFinalizer(string $modelName, string $modelInheritance, string $properties): string {

		return <<<EOD
<?php
$modelInheritance {
	const MODEL = '$modelName';

$properties
}
?>
EOD;
	}

	/**
	 * Creates the model's class-file within given code-text
	 * @param string $path The full filepath ( within filename) of the model's class-file
	 * @param mixed $content The code-text of the model
	 * @return void
	 */
	static function renderModelFile(string $path, $content = ''): void {
		$fres = fopen($path, 'w', false);
		if (fclose($fres)) file_put_contents($path, $content);
	}

	/**
	 * @param string $id by default null
	 * @return string if $id is not null, by default array of MSSQL datatypes for v.10.1.16-MariaDB
	 */
	static function fieldType(string $id = '') {
		$mssqlType = [];
		return ($id && isset($mssqlType[$id]))? $mssqlType[$id]: $mssqlType;
	}

	/**
	 * Generetes array of the validation options for the given table
	 */
	static function validationOptions() {}
}
?>