<?php
class ModelValidation
	{
		function __construct(array $modelRules, array $userFields = [])
			{
				$this->validate($modelRules);
			}

		protected function validate(array $modelRules, array $userFields = [])
			{
				$fields = array_keys($modelRules);

				$fields = array_diff($userFields, $fields);

				while($modelRules)
					{
						$modelRules = array_shift($modelRules);
					}
			}
	}
?>