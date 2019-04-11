function modalVsMenu() {
	w3.removeClass('#maintabs', 'w3-hide-small w3-hide-medium');
}

// Header search form validation
$('#headersearch_btn').click(function(e) {
	var crit = $('#headersearchform').serializeArray();
	$('#modalcontent').html($('#headersearchform').attr('action')+crit).show();

	return false;

	$.post(SiteURL+'?search/qs', {
		criteria: crit
	},
	function(data, textStatus, jqXHR) {
		$('#modalcontent').html(data);

		$('#modalwindow').css('display','block');
	}, 'text');
});

// Header login form validation
$('#headerloginform').submit(function(e) {
	var password = md5($(this).find('input[type=password]:eq(0)').val());
	$(this).find('input[type=password]:eq(0)').val(password);

	delete(password);
});