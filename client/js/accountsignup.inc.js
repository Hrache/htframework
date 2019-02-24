// Getting the list of countries for the new account form
if ($('#country_id') && $('#country_id').find('option').length <= 1)
{
	$.post(SiteURL+'?account',
	{
		async: 'countries'
	},
	function(data, textStatus, jqXHR)
	{
		$('#country_id').append(data);
	}, 'text');
}

// Filling up the years of the new account form
$('#byear').append(HracheJS.NumberRangeOptions(1940, (new Date()).getFullYear()));

// New account submit
$('#createaccount').click(function() {
	$.post(SiteURL+'?account/signup', {
		signupform: $('#signupform').serializeArray()
	},
	function(d,ts,xhr) {
		$('#modalcontent').html(d);

		getById('modalwindow').style.display = 'block';
	}, 'text');
});

/**
 * Initializes date form element combination
 * and stores data into the hidden input element
 * @param string dayidu			The id of the DOM SELECT tag
 * @param string monthidu		The id of the DOM SELECT tag
 * @param string yearidu		The id of the DOM SELECT tag
 * @param string hiddenidu	The id of the DOM hidden tag
 * @return
 */
function FormDate(dayidu, monthidu, yearidu, hiddenidu) {
	this.dayid = dayidu;
	this.monthid = monthidu;
	this.yearid = yearidu;
	this.hiddenid = hiddenidu;
	var date = null;
	var delimiter = '-';

	/**
	 * @param int format	The format of the date possible values are:
	 * 0 - yyyy mm dd
	 * 1 - dd mm yyyy
	 * 2 - mm dd yyyy
	 */
	var format = 1;
	var year = null;
	var day = null;
	var month = null;

	function hiddenValue() {
		switch (format) {
			case (0): {
				date = year +delimiter+ month +delimiter+ day;
				break;
			}
			case (1): {
				date = day +delimiter+ month +delimiter+ year;
				break;
			}
			case (2):
			default:
			{
				date = month +delimiter+ day +delimiter+ year;
			}
		}

		$('#'+this.hiddenid).val(date);
	}

	function setFormat(format) {
		if ('012'.search(parseInt(format))) {
			format = format;
		}

		return this;
	}

	function setDelimiter(delimiteru)
	{
		delimiter = delimiteru;

		return this;
	}

	this.newDate = function()
	{
		day = $('#'+this.dayid).val();
		month = $('#'+this.monthid).val();
		year = $('#'+this.yearid).val();

		hiddenValue();
	};
}

var fdate = new FormDate('bday', 'bmonth', 'byear', '<?= Accounts::birthday?>');

$('#'+fdate.dayid).change(function() {
	fdate.newDate();
});

$('#'+fdate.monthid).change(function() {
	fdate.newDate();
});

$('#'+fdate.yearid).change(function() {
	fdate.newDate();
});