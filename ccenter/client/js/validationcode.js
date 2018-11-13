$('#codeform').submit(function(e)
{
	e.preventDefault();

	var Validation =
	{
		// Checks whether the data in the argument is variable or no
		isVar: function(varValue)
		{
			return /[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/.exec(varValue);
		},

		// Checks whether the data in the argument is variable or no
		isNumeric: function(varValue)
		{
			return /\d+/.exec(varValue);
		},

		/**
		* @var jQuery object obsObject Message is going to be placed after this object
		* @var string, numeric text The text of the error message
		* @return boolean false Because message was fixed
		*/
		errorMessage: function(obsObject, text)
		{
			if (!obsObject || !text)
			{
				alert('Error message or observable objects are missing.');
				return false;
			}
			$('<div></div>').css(
			{
				'color': 'red',
				'cursor': 'pointer'
			}).click(function()
			{
				$(this).remove();
			}).text(text).insertAfter(obsObject);

			return false;
		}
	};

	// Variable name
	if (!Validation.isVar($('#varname').val()))
	{
		return Validation.errorMessage($('#varname'), PHPBridge.error_varname);
	}

	// RegExp
	if (!$('#form_regexp').val() && !$('#form_filters').val())
	{
		return Validation.errorMessage($('#form_regexp'), PHPBridge.error_filter_or_regexp);
	}

	// Min-length
	if ($('#minlength').val() && !Validation.isNumeric($('#minlength').val()))
	{
		return Validation.errorMessage($('#minlength'), PHPBridge.error_not_numeric);
	}

	// Max-length
	if ($('#maxlength').val() && !Validation.isNumeric($('#maxlength').val()))
	{
		return Validation.errorMessage($('#maxlength'), PHPBridge.error_not_numeric);
	}

	var data =
	{
		async: true,
		'codedata': $('#codeform').serializeArray()
	};

	$.post(PHPBridge.ajax_url, data,	function(d,ts,xhr)
	{
		$('#generated_code').html(d);
		$('#clrgeneddata').attr('disabled', false);
	});
});

$('#clrgeneddata').click(function()
{
	$('#generated_code').html('');
	$(this).attr('disabled', true);
});
