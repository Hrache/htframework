function modalVsMenu()
{
	w3.removeClass('#maintabs', 'w3-hide-small w3-hide-medium');
}

// Getting the list of car brands for the header search form
if ($('#carbrand'))
{
	$.post(SiteURL+'?search',
	{
		async: 'carbrands'
	},
	function(data, textStatus, jqXHR)
	{
		$('#carbrand').append(data);
		return;
	}, 'text');

	ArmCarShopJS.BrandForModel('carbrand', 'carmodel', SiteURL+'?search/ajaxmodel', function(data, textStatus, jqXHR)
	{
		if ($('#carmodel>option').length > 1)
		{
			$('#carmodel').fadeIn();
		}
		else
		{
			$('#carmodel').fadeOut();
		}
	});
}

// Filling up car release year
$('#caryearfrom').append(PygerJS.NumberRangeOptions(1941, (new Date()).getFullYear(), true))
.change(function()
{
	var start = $(this).val();

	if (start == '')
	{
		$('#caryearto').html(DOMHelpersJS.option);
		return false;
	}

	$('#caryearto').html(PygerJS.NumberRangeOptions(start, (new Date()).getFullYear())).prepend(DOMHelpersJS.option);
});

// Header search form validation
$('#headersearch_btn').click(function(e)
{
	var crit = $('#headersearchform').serializeArray();

	$('#modalcontent').html($('#headersearchform').attr('action')+crit).show();

	return false;

	$.post(SiteURL+'?search/qs',
	{
		criteria: crit
	},
	function(data, textStatus, jqXHR)
	{
		$('#modalcontent').html(data);

		$('#modalwindow').css('display','block');
	}, 'text');
});

// Header login form validation
$('#headerloginform').submit(function(e)
{
	var password = md5($(this).find('input[type=password]:eq(0)').val());

	$(this).find('input[type=password]:eq(0)').val(password);

	delete(password);
});