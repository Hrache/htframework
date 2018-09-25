<?php
define('Welcome', 'welcome');
define('CreateNewProject', 'newprojectcreate');
define('StrongPass', 'strongpass');
define('DbToModel', 'dbtomodel');
define('ModelSettings', 'modelsettings');
define('ListOfTables', 'listoftables');
define('GenerateModels', 'generatemodels');

/*	Model classes	*/
$tablename = '';

if (post_(Async))
{
	// ACTION: generate the list of tables of the selected database
	if (CurrentAction === ListOfTables && post_('dbinfo'))
	{
		$conspcs = post_('dbinfo');
		$con = new ArrayClass([
			DatabaseClass::DBTYPE => DatabaseClass::MYSQL,
			MySQLClass::DBUSER => $conspcs[MySQLClass::DBUSER],
			MySQLClass::DBPASSWORD => $conspcs[MySQLClass::DBPASSWORD],
			MySQLClass::DBHOST => $conspcs[MySQLClass::DBHOST],
			MySQLClass::DBPORT => $conspcs[MySQLClass::DBPORT],
			MySQLClass::DBNAME => $conspcs[MySQLClass::DBNAME],
			MySQLClass::DBCHARSET => $conspcs[MySQLClass::DBCHARSET]
		]);

		__('session')->add('dbconsettings', $con);

		# DATABASE: setting connection with database
		$con = new DatabaseClass($con);
		$con = $con->connect();
		$tables = $con->PDOFetchArray("SHOW TABLES;");

		$con->close();

		$tables = MD5Index::encode($tables->input);

		# Table md5 keys
		__('session')->add('md5keys', $tables);

		array_walk($tables, function(&$v, $k)
		{
			$v = HTMLHelpers::DOMOption($k, $v[MD5Index::Alias]);
		});

		$tables = implode('', $tables);
		$tables = HTMLHelpers::DOMOption('all', _abc('all')).$tables;

		die($tables);
	}

	if (CurrentAction === GenerateModels && post_('tableindex'))
	{
		$dir = post_("physdir") ?? Models;

		$con = __('session')->get('dbconsettings');
		$con = new DatabaseClass($con);
		$con = $con->connect();

		lib_load('db/model/mysql', 'validation');

		if (strtolower(post_('tableindex')) == 'all')
		{
			new TableToModel($dir, $con);
		}
		else
		{
			$tables = __('session')->get('md5keys')[post_('tableindex')][MD5Index::Source];

			new TableToModel($dir, $con, $tables);

			$con->close();

			unset($con);
		}

		die("Files are stored under ".Models." directory.<br/>".implode('', scandir_c(Models, true, false)));
	}
}

if (CurrentAction === DbToModel && !post_(Async))
{
	__('language')->append('modelvalidation');
}

__('page')->setTitle(_abc(CurrentAction));
?>