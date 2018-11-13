<?php
final class SQLStatic
{
	/**
	*	Select * or the given array within names of columns from the given table name
	*/
	public static function select(string $tableName, array $cols = [], array $where = [], bool $distinct = false)
	{
		$cols = (!$cols)? '*': implode(',', $cols);
		$where = ($where)? ' WHERE '.implode(' ', $where): '';

		return sprintf('SELECT %s%s FROM %s%s;', $distinct? 'DISTINCT ': '', $cols, $tableName, $where);
	}
}