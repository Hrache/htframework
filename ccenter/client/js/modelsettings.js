progressBar = new HracheJS.UIWizardProgressBar($('#progressbar'), 2);
tableIndex = null;
dbconspecs = {};
errors = [];

// posting the index of the database
var sendButton = function()
{
	$('#dbdata [type=text]').each(function()
	{
		var name = $(this).attr('name');
		var value = $(this).val();
		var isRequired = required.indexOf(name);

		if ((isRequired === 0 || isRequired > 0) && (value === ''))
		{
			errors[errors.length] = "<div>"+$("#dbdata [name="+name+"]").attr('alt')+": is required.</div>";
		}

		dbconspecs[name] = value;
	});

	if (errors.length)
	{
		var popuptext = "";

		while (i = errors.shift()) popuptext += i;

		HracheJS.PopupMessage(popuptext);
		delete(popuptext);
	}
	else
	{
		// AJAX
		$.post(url_listoftables_php,
		{
			async: true,
			'dbinfo': dbconspecs
		},
		function(data, textStatus, jqXHR)
		{
			HracheJS.PopupMessage(data);

			$('#tableselect').html(data);
			progressBar.trigger(1);
		});
	}
};

var generateModelsButton = function()
{
	// the index of the table
	tableIndex = $('#tableselect').val();

	if (!tableIndex)
	{
		progressBar.trigger(-1);

		return false;
	}

	// AJAX
	$.post(url_generatemodels_php,
	{
		async: true,
		'tableindex': tableIndex
	},
	function(data, textStatus, jqXHR)
	{
		HracheJS.PopupMessage(data);

		progressBar.trigger(2);
	});
};
