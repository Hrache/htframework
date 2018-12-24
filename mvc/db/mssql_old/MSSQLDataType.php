<?php
class MSSQLDataType
{
	const BIGINT = 'bigint';
	//8 Integer from -2^63 (-9 223 372 036 854 775 808) to 2^63-1 (9 223 372 036 854 775 807).
	const INT = 'int';
	//4 Integer from -2^31 (-2 147 483 648) to 2^31-1 (2 147 483 647).
	const SMALLINT = 'smallint';
	//2 Integer from -2^15 (-32 768) to 2^15-1 (32 767).
	const TINYINT = 'tinyint';
	//1 Integer from 0 to 255.
	const BIT = 'bit';
	//1 bit Integer 0 or 1.
	const DECIMAL_ps = 'decimal_ps';
	//(PRECISION, SCALE) 5-17 Numeric data type with fixed precision and scale (accuracy 1-38, 18 by default and scale 0-p, 0 by default).
	const NUMERIC = 'numeric';
	//5-17	Same as data type 'decimal'.
	const MONEY = 'money';
	//8 Financial data type from -2^63 (-922 337 203 685 477.5808) to 2^63-1 (922 337 203 685 477.5807) with the precision of one ten-thousandth unit.
	const SMALLMONEY = 'smallmoney';
	//4	Financial data type from -2^31 (-214 748.3648) to 2^31-1 (214 748.3647) with the precision of one ten-thousandth unit.
	const FLOAT_n = 'float_n';
	//4-8 Numeric data type with float precision, where n is the number of mantis bits (1-24, accuracy of 7 digits, size of 4 bytes and 25-53, accuracy of 15 digits and size of 8 bytes).
	const REAL = 'real';
	//4 Numeric data type with float precision that is defined as a float(24).
	const DATETIME = 'datetime';
	//8 Data type representing date and time from 1.1.1753 to 31.12.9999 with precision about 3ms. Values are rounded to .000, .003 and .007.
	const SMALLDATETIME = 'smalldatetime';
	//4 Data type representing date and time from 1.1.1900 to 6.6.2079 with precision of 1min. Values up to 29.998 are rounded down and values from 29.999 are rounded down to the nearest minute.
	const CHAR = 'char';
	//n Char string of fixed length and max. length of 8000 chars.
	const VARCHAR = 'varchar';
	//n Char string of variable length and max. length of 8000 chars.
	const TEXT = 'text';
	//n Char string of variable length and max. length of 2^31-1 (2 147 483 647) chars.
	const NCHAR = 'nchar';
	//2*n Unicode char string of fixed length and max. length of 4000 chars.
	const NVARCHAR = 'nvarchar';
	//2*n Unicode char string of variable length and max. length of 4000 chars.
	const NTEXT = 'ntext';
	//2*n Unicode char string of variable length and max. length of 2^30-1 (1 073 741 823) chars.
	const BINARY = 'binary';
	//n+4 Binary data of fixed length and max. length of 8000 bytes.
	const VARBINARY = 'varbinary';
	//n+4 Binary data of variable length and max. length of 8000 bytes.
	const IMAGE = 'image';
	//n Binary data of variable length and max. length of 2^31-1 (2 147 483 647) bytes.
	const CURSOR = 'cursor';
	//For storing the reference to cursors in a variable or in a procedure (no for CREATE TABLE).
	const SQL_VARIANT = 'sql_variant';
	//For storing value of another type (no text, ntext, image, timestamp, sql_variant) of max. length to 8016 bytes. ODBC doesn't fully support this data type.
	const TABLE = 'table';
	//For storing the query result for the later usage.
	const TIMESTAMP = 'timestamp';
	//8+4 Data type generates automatically binary numbers, unique in the database, used mostly to the rows identification. There can be only column of this data type in the table.
	const UNIQUEIDENTIFIER = 'uniqueidentifier';
	//Data type for storing GUID (new by means of the NEWID function or existing from the string in the form xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx, for example 6F9619FF-8B86-D011-B42D-00C04FC964FF).
}
?>
