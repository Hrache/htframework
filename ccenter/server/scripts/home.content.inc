<?php
if (CurrentAction === ModelSettings)
{
	__('language')->append('modelvalidation');
}

if (CurrentAction === ValidationCode)
{
	__('language')->append('varvalidation');
}

__('page')->snippet->insert(CurrentAction);
?>
