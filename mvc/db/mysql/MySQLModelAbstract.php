<?php
/**
 * @author Max Pyger
 */
trait ModelsTrait
{
	/**
	 * Returns the min-length of the field by the given name
	 * @param string $field The name of the field of the model
	 * @return int
	 */
	static function getMaxLengthRule(string $field)
	{
		return intval(self::rules[$field][ValidationClass::VALIDATION_LENGTH_MYSQL]);
	}
}

abstract class MySQLModelAbstract
{
	protected $model;
	protected $modelData;

	function __construct(string $model, array $modelsData = [])
	{
		$this->model = self::_fier($model);
		$this->modelData = $modelsData;
	}

	protected function initProperties(array $modelsData)
	{
		foreach ($this as $prop => $val)
		{
			if (isset($modelsData[$prop]))
			{
				$this->$prop = $modelsData[$prop];
			}
		}
	}

	/**
	 * @param Array $id
	 * @return Array Empty or full
	 */
	static function getByColumn(string $column, $value, string $model): string
	{
		return "SELECT * FROM ".self::_fier($model)." WHERE ".self::_fier($column)."='".$value."';";
	}

	/**
	* Description of updateQuery
	* @param array $fieldValue
	* @param string $modelName
	**/
	static function updateQuery(array $modelNames, array $fieldsValues, array $where = []): string
	{
		// TABLE NAMES
		$modelNames_ = '';

		foreach ($modelNames as $i => $val)
		{
		    $modelNames_[] = self::_fier($val);
		}

		$modelNames_ = implode(',', $modelNames_);
		$set = '';	//	SET
		
		foreach ($fieldsValues as $key => $val)
		{
		    $set[] = sprintf ('%s = \'%s\'', self::_fier ($val), $key);
		}

		$set = implode (',', $set);
		$where = '';	//	WHERE

		foreach ($where as $key => $val)
		{
		    $where[] = sprintf('%s = \'%s\'', self::_fier($val), $key);
		}

		$where = 'WHERE ' . implode(',', $where);

		return sprintf('UPDATE %s SET %s %s;', $modelNames_, $set, $where);
	}

	/**
	 * @param string $model Get all data from database
	 * @return Array Empty or full
	 */
	static function getAll(string $model): string
	{
		return "SELECT * FROM ". self::_fier($model) .";";
	}

	/**
	* Gets information around the given fields
	* @param ArrayClass $fields The list of fields for fetching
	* @param String $model The name of the model
	* @return Array Empty or full
	*/
	static function getByFields(ArrayClass $fields, string $model): string
	{
		self::_fier8($model);

		if ($fields->isEmpty() OR !$model)
		{
			return '';
		}

		$fields->eachItem(function(&$v, $k)
		{
			self::_fier($v);
		});

		return "SELECT " . implode(',', $fields->input)." FROM $model;";
	}
	
	/**
	 * Deletes data from table/model by the given columns
	 */
	static function deleteByColumn(string $column, $value, string $model)
	{
		return sprinf('DELETE FROM %s WHERE %s = \'%s\';', self::_fier($model), self::_fier($column), $value);
	}
	
	/**
	 * @param array $fields
	 * @param array $_by
	 * @param string $model
	 * @return Array Empty or full
	 **/
	static function getColumnsBy(Array $fields, Array $_by, string $model): string
	{
		self::_fier8($model);

		array_walk($fields, function(&$v, $k)
		{
			self::_fier8($v);
		});

		array_walk($_by, function(&$v, $k)
		{
			$v = self::_fier($k) . '=' . $v;
		});

		return "SELECT ".implode(',', $fields)." FROM $model WHERE ".implode(' AND ', $_by).";";
	}
	
	/**
	* Does validation of the entered data
	* @param  array $rules The rules of the child class of the model of MySQLModelAbstract class
	* @param  array $insertValues The data for field of the validation model/mysql table
	* @return array Array of errors for each
	*/
	static function validate(ArrayClass $rules, ArrayClass $data): ArrayClass
	{
		require_once(realpath(__DIR__.'/../../scripts/mysqlmodelabstarctvalidate.php'));
	}
	
	static function getTypeGroup($type): int
	{
		require_once(realpath(__DIR__.'/scripts/mysqlmodelabstractgettypegroup.php'));
	}

	/**
	 * Converts the given array into MySQL insertion query string
	 * @param array $data associative array of insertion data
	 * @return string string representation of MySQL query or empty string in case of negative flow
	 */
	static function insertByMap(array $data, string $model): string
	{
		self::_fier8($model);

		if (!$data)
		{
			return '';
		}

		array_walk($data, function(&$v, $k)
		{
			self::_fier8($v);
		});
		return sprintf("INSERT INTO $model (%s) VALUES (%s);", implode(',', array_keys($data)), implode(',', array_values($data)));
	}

	static function _fier($text): string
	{
		return '`' . $text . '`';
	}

	/**
	 * The same as _fier but as argument is used reference of the
	 * variable of input data
	 */
	static function _fier8(&$text): void
	{
		$text = self::_fier($text);
	}
}
?>
