<?php
$tablename = '';
// the name of the curent table
define('MD5DB', 'md5db');
define('MD5TB', 'md5tb');
define('Posted_db', 'database');
define('Posted_tb', 'table');
/*
$fieldname = '';
define('MD5FD', 'md5fd');
define('Posted_fd', 'field');
define('FieldsOptions', 'fieldsoptions');
define('TableDesc', 'tabledesc');
$fieldops = ['requiredfield', 'confirmfield', 'fieldtype', 'enumcontent', 'minlength', 'addregex'];
__('session')->add(FieldsOptions, []);
*/
if (!__('session')->get(MD5DB)) __('session')->add(MD5DB, MD5Index::encode(array_keys(__('settings')->getSetting(SettingsClass::DatabaseModule)->input)));
if (post_(Async)) {
// SESSION: storing the md5 indexes and the name of the database into the session cookie
	if (post_(Posted_db)) __('session')->add(Posted_db, __('session')->get(MD5DB, post_(Posted_db), MD5Index::Source));
// DATABASE: setting connection with database
	changeDatabase(__('session')->get(Posted_db));
// SESSION: storing the md5 indexes of the tables of the selected database into the session cookie
	__('session')->add(MD5TB, MD5Index::encode(__('database')->PDOFetchArray('SHOW TABLES;', MySQLClass::PDO_FETCH_COLUMN, false)));
// ACTION: generate the list of tables of the selected database
	if (CurrentAction === ListOfTables) {
		__('database')->close();
		$tables = HTMLHelpers::DOMOption('', '');
		$_ = __('session')->get(MD5TB);
		array_walk($_, function(&$v, $k) {
			$v = $v[MD5Index::Alias];
			$v = HTMLHelpers::DOMOption($k, $v);
		});
		$tables .= implode('', $_);
		die($tables);
	}
/*
// ACTION: generate the list of fields of the selected table (and database)
	if (post_(Posted_tb) && CurrentAction === TableFields) {
// SESSION: storing md5 index and the name of table into the session cookie
		global $infoa;
		$md5a = [];
		$fields = HTMLHelpers::DOMOption('', '');
		$tablename = __('session')->get(MD5TB, post_(Posted_tb), MD5Index::Source);
		$fieldsInfo = __('database')->PDOFetchArray('DESCRIBE `' . $tablename .'`;', MySQLClass::PDO_FETCH_DEFAULT, false);
		__('database')->close();
		__('session')->add(TableDesc, $fieldsInfo);
		array_walk($fieldsInfo, function(&$v, $k) {
			global $infoa;
			$infoa[] = $v[MySQLField::tbl_field];
		});
		$infoa = MD5Index::encode($infoa);
		__('session')->add(MD5FD, $infoa);
		array_walk($infoa, function(&$v, $k) {
			$v = $v[MD5Index::Alias];
			$v = HTMLHelpers::DOMOption($k, $v);
		});
		$fields .= implode('', $infoa);
		die($fields);
	}
	if (post_(Posted_fd) && CurrentAction === FieldDetails) {
		global $details;
		$details = '';
		$fieldsDetails = __('session')->get(TableDesc);
		array_walk($fieldsDetails, function(&$v, $k) {
			global $details;
			if ($v[MySQLField::tbl_field] === __('session')->get(MD5FD, post_(Posted_fd), MD5Index::Source)) {
				__('session')->add(Posted_fd, __('session')->get(MD5FD, post_(Posted_fd), MD5Index::Source));
				$details = json_encode([
					MySQLField::tbl_field => $v[MySQLField::tbl_field],
					MySQLField::tbl_type => $v[MySQLField::tbl_type],
					MySQLField::tbl_default => $v[MySQLField::tbl_default],
					MySQLField::tbl_null => $v[MySQLField::tbl_null],
					MySQLField::tbl_key => $v[MySQLField::tbl_key],
					MySQLField::tbl_extra => $v[MySQLField::tbl_extra],
				]);
			}
		});
		die($details);
	}
// ACTION: store field validation info into the database
	if ((CurrentAction === StoreFieldOpts) && is_array(post_(ValidSettings))) {
		$vSettings = post_(ValidSettings);
		__('session')->add([FieldsOptions, $tablename], JSSerializedArray::decodeAll($vSettings, $fieldname));
		die(__FILE__);
	}
// ACTION: generates the model file/s of the selected table/s
	if (CurrentAction === GenerateModels) {
		lib_load('validation', 'db\mysql\model');
		if ($table == self::TableAll) {
			new TableToModel(Models, __('database'));
		}
		else {
			new TableToModel(Models, __('database'), $table);
		}
		__('database')->close();
		//	echo HTMLHelpers::(implode('-', scandir_c(Models, true)->input));
	}

*/
}