<?php
class MySQLDataType
{
	const SMALLINT     = 'smallint';
	const TINYINT      = 'tinyint';
	const MEDIUMINT    = 'mediumint';
	const MySQL_INT    = 'int';
	const BIGINT       = 'bigint';
	const MySQL_REAL   = 'real';
	const MySQL_FLOAT  = 'float';
	const MySQL_DOUBLE = 'double';
	const BINARY     = 'binary';
	const VARBINARY  = 'varbinary';
	const DECIMAL    = 'decimal';
	const BLOB       = 'blob';
	const TINYBLOB   = 'tinyblob';
	const MEDIUMBLOB = 'mediumblob';
	const LONGBLOB   = 'longblob';
	const DATE       = 'date';
	const DATETIME   = 'datetime';
	const TIME       = 'time';
	const TIMESTAMP  = 'timestamp';
	const YEAR       = 'year';
	const TEXT       = 'text';
	const TINYTEXT   = 'tinyint';
	const MEDIUMTEXT = 'mediumint';
	const LONGTEXT   = 'longint';
	const CHAR      = 'char';
	const VARCHAR   = 'varchar';
	const NVARCHAR  = 'nvarchar';
	const JSON      = 'json';
	const GEOMETRY           = 'geometry';
	const LINESTRING         = 'linestring';
	const POINT              = 'point';
	const POLYGON            = 'polygon';
	const MULTILINESTRING    = 'multilinestring';
	const MULTIPOINT         = 'multipoint';
	const MULTIPOLYGON       = 'multipolygon';
	const GEOMETRYCOLLECTION = 'geometrycollection';
	const NUMERIC = [
		self::DECIMAL,
		self::INT,
		self::SMALLINT,
		self::TINYINT,
		self::MEDIUMINT,
		self::BIGINT,
		self::REAL,
		self::FLOAT,
		self::DOUBLE,
	];
	const BINARY_ = [
		self::BINARY,
		self::VARBINARY,
	];
	const BLOB_ = [
		self::BLOB,
		self::TINYBLOB,
		self::MEDIUMBLOB,
		self::LONGBLOB,
	];
	const DATETIME_ = [
		self::DATE,
		self::DATETIME,
		self::TIME,
		self::TIMESTAMP,
		self::YEAR,
	];
	const TEXT_ = [
		self::TEXT,
		self::TINYTEXT,
		self::MEDIUMTEXT,
		self::LONGTEXT,
	];
	const CHAR_ = [
		self::CHAR,
		self::VARCHAR,
		self::NVARCHAR,
		self::JSON,
	];
	const SPATIAL = [
		SELF::GEOMETRY,
		SELF::LINESTRING,
		SELF::POINT,
		SELF::POLYGON,
		SELF::MULTILINESTRING,
		SELF::MULTIPOINT,
		SELF::MULTIPOLYGON,
		SELF::GEOMETRYCOLLECTION,
	];
	const NUMERIC_GRP  = 'a';
	const BINARY_GRP   = 'b';
	const BLOB_GRP     = 'c';
	const DATETIME_GRP = 'd';
	const TEXT_GRP     = 'e';
	const CHAR_GRP     = 'f';
	const SPATIAL_GRP  = 'g';
}
?>
