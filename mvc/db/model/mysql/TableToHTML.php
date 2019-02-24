<?php

/**
 * Description of ModelToHTMLClass
 * @author Max Pyger
 * */
class TableToHTML {
	const SMALL_TEXT = [
		'min' => 1,
		'max' => 3700,
	];
	const MEDIUM_TEXT = [
		'min' => 3701,
		'max' => 10000,
	];
	const LARGE_TEXT = [
		'min' => 10001,
	];
	const SMALL_NUM = [
		'min' => 1,
		'max' => 7,
	];
	const MEDIUM_NUM = [
		'min' => 8,
		'max' => 15,
	];
	const LARGE_NUM = [
		'min' => 16,
		'max' => 20,
	];

	const ENUM = 2;
	const int_4 = 3;

	private $tables;

	public function __construct(string $modelsDir, string ...$models) {
		lib_load('utilities', 'text');
		set_include_path(get_include_path().PATH_SEPARATOR.$modelsDir);

		// array of names of files of model-classes
		$modelsList = scandir_c($modelsDir);

		StringHelper::lastSignSlash($modelsDir);

		foreach ($models as $i => $model) {
			if (!class_exists($model)) {
				_delete($models, $i);
				continue;
			}

			// ReflectionClass of the current model-class
			$rModel = new ReflectionClass($model);

			// constants of the current model
			$rModelConstants = $rModel->getConstants();

			// array of rules of the current model
			$rModelRules = $rModel->getConstant('rules');

			foreach ($rModelConstants as $i => $const) {
				if (in_array($i, ['rules', 'MODEL'])) {
					continue;
				}

				// rules for current field
				$cRules = new FieldRules(settype($rModelRules[$const], 'object'));
			}
		}

		unset($modelsList);
	}

	public static function typeToTag(MSSQLField $field) {
		lib_load('html');
	}

	public function __get($name) {
		return $this->$name;
	}

	public function __set($name, $value) {
		$this->$name = $value;
	}
}
?>