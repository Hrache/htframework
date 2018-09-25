<?php
class PageClass extends PageMethods {
	function __construct() {
		define('Welcome', 'welcome');
		define('NewProject', 'newproject');
		define('CreateNewProject', 'newprojectcreate');
		define('StrongPass', 'strongpass');
		define('DbToModel', 'dbtomodel');
		define('ModelSettings', 'modelsettings');
		define('ListOfTables', 'listoftables');
		define('GenerateModels', 'generatemodels');
/*
		define('TableFields', 'tablefields');
		define('FieldDetails', 'fieldetails');
		define('StoreFieldOpts', 'storefieldopts');
		define('ValidSettings', 'validsettings');
*/
		if (CurrentAction === DbToModel && !post_(Async))
			__('language')->append('modelvalidation');
		require_once(Scripts.'home.inc.php');
		__('page')->setTitle(_abc(CurrentAction));
	}
	function content() {
		require_once(Scripts.'home.rout.php');
	}
	function resources() {}
	function bottomres() {
		if (CurrentAction === DbToModel) {
?>
			<script type="text/javascript">
			ListOfTables_php = "<?= CurrentURL.ListOfTables?>";
			GenerateModels_php = "<?= CurrentURL.GenerateModels?>";
			Async_php = "<?= Async?>";
			TableListAjaxFailure_php = "<?= _abc('TableListAjaxFailure')?>";
			</script>
			<?= HTMLHelpers::JSScript('client/js/modelsettings.js')?>
<?php
		}
	}
	function jscode() {}
}
?>