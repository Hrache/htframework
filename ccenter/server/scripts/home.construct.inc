<?php
define('Welcome', 'welcome');
define('StrongPass', 'strongpass');
define('ModelSettings', 'modelsettings');
define('ListOfTables', 'listoftables');
define('GenerateModels', 'generatemodels');
define('ValidationCode', 'validationcode');

# Model classes
$tablename = '';

if (post_(Async)) {
	# Generate's the list of tables of the selected database
	if (CurrentAction === ListOfTables && post_('dbinfo')) {
		$conspcs = post_('dbinfo');
		$con = new ArrayClass([
			DatabaseClass::VENDOR => DatabaseClass::VENDOR_MSSQL,
			PDOHelpersClass::DBUSER => $conspcs[MySQLClass::DBUSER],
			PDOHelpersClass::DBPASS => $conspcs[MySQLClass::DBPASSWORD],
			PDOHelpersClass::DBHOST => $conspcs[MySQLClass::DBHOST],
			PDOHelpersClass::PORT => $conspcs[MySQLClass::DBPORT],
			PDOHelpersClass::DBNAME => $conspcs[MySQLClass::DBNAME],
			PDOHelpersClass::CHARSET => $conspcs[MySQLClass::DBCHARSET]
		]);
		__('session')->add('dbconsettings', $con);

		# Setting the connection with database
		$con = new DatabaseClass($con);
		$con = $con->connect();
		$tables = $con->PDOFetchArray("SHOW TABLES;");
		$con->close();

		$tables = MD5Index::encode($tables->input);

		# Table md5 keys
		__('session')->add('md5keys', $tables);

		array_walk($tables, function(&$v, $k) {
			$v = HTMLHelpers::DOMOption($k, $v[MD5Index::Alias]);
		});

		$tables = implode('', $tables);
		$tables = HTMLHelpers::DOMOption('all', _abc('all')).$tables;
		die($tables);
	}

	# Generate's model-files of the chosen table
	if (CurrentAction === GenerateModels && post_('tableindex')) {
		$dir = post_("physdir") ?? Models;
		$con = __('session')->get('dbconsettings');
		$con = new DatabaseClass($con);
		$con = $con->connect();
		lib_load('db/model/mysql', 'validation');

		if (strtolower(post_('tableindex')) == 'all') new TableToModel($dir, $con);
		else {
			$tables = __('session')->get('md5keys')[post_('tableindex')][MD5Index::Source];
			new TableToModel($dir, $con, $tables);

			$con->close();

			unset($con);
		}

		die("Files are stored under ".Models." directory.<br/>".implode('', scandir_c(Models, true, false)));
	}

	# Generate's PHP validation code
	if (CurrentAction === ValidationCode && post_('codedata')) {
		# Names of the form inputs
		$clientinputs = ['varname', 'form_filters', 'form_regexp', 'enum', 'minlength', 'maxlength'];

		# Data from the client
		$codedata = post_('codedata');

		# Keeps the response text: the generated code
		$_code_ = '';
		while ($codedata) {
			$field = array_shift($codedata);
			if ($field['value'] && in_array($field['name'], $clientinputs)) {
				if ($field['name'] === 'varname') $_code_ .= '$'.$field['value'].' = ';

				$_code_ .= '';
			}
		}

		die($_code_);

		$_code_ = <<<EOD
if () {

}
EOD;
	}

	die('early response');
}

__('page')->setTitle(_abc(CurrentAction));
?>
