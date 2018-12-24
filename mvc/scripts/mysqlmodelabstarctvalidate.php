<?php
$template_array = new ArrayClass(
[
	ValidationBase::VALIDATION_ENUM_MYSQL    => false,
	ValidationBase::VALIDATION_EXTRA_MYSQL   => false,
	ValidationBase::VALIDATION_LENGTH_MYSQL  => false,
	ValidationBase::VALIDATION_NULL_MYSQL    => false,
	ValidationBase::VALIDATION_TYPE_MYSQL    => false,
	ValidationBase::VALIDATION_DEFAULT_MYSQL => false,
]);

$errors = new ArrayClass();

while (!$data->isEmpty())
{
	$value = $data->pull();
	oog($value);
}

foreach ($data->input as $i => $val)
{
	// array of rules of individual validaton object
	$field_rules = $rules->item($i);

	// initing the error array of the observable field
	$errors->add($template_array, $i);
	$error = new ArrayClass();

	// looping through field rules ( $field_rules)
	foreach ($field_rules as $key =>$value)
	{
		$error = &$errors->add(null, $i);

		switch($key)
		{
			case (ValidationBase::VALIDATION_NULL_MYSQL):
			{
				if (!$data[$i] && $value === 'NO')
				{
					$error->add(ValidationBase::VALIDATION_NULL_MYSQL, true);
				}

				break;
			}
			case (ValidationBase::VALIDATION_ENUM_MYSQL):
			{
				if (!in_array($data[$i], $value))
				{
					$error->add(ValidationBase::VALIDATION_ENUM_MYSQL, true);
				}
							
				break;
			}
			case (ValidationBase::VALIDATION_EXTRA_MYSQL):
			{
				// $error->add (ValidationBase::VALIDATION_EXTRA_MYSQL, true);
				break;
			}
			case (ValidationBase::VALIDATION_LENGTH_MYSQL):
			{
				if (strlen($data[$i]) > $value)
				{
					$error->add(ValidationBase::VALIDATION_LENGTH_MYSQL, true);
				}

				break;
			}
			case (ValidationBase::VALIDATION_TYPE_MYSQL):
			{
				$type_grp = self::getTypeGroup($value);
				
				switch ($type_grp)
				{
					case (MySQLDataType::NUMERIC_GRP):
					{
						$error->add(ValidationBase::VALIDATION_TYPE_MYSQL, !ValidationClass::isNumeric($data[$i]));

						break;
					}
					case (MySQLDataType::SPATIAL_GRP): {}
					case (MySQLDataType::TEXT_GRP): {}
					case (MySQLDataType::DATETIME_GRP):
					{
						$error->add(ValidationBase::VALIDATION_TYPE_MYSQL, !is_date($data[$i]));
					
						break;
					}
					case (MySQLDataType::CHAR_GRP):
					{
						$error->add(ValidationBase::VALIDATION_TYPE_MYSQL, !is_string ($data[$i]));
					
						break;
					}
					case (MySQLDataType::BLOB_GRP): {}
					case (MySQLDataType::BINARY_GRP): {}
				}

				break;
			}
			default: {}
		}
	}

	oog($data);
}

return $errors;
?>