/**
Global Ajax setup
*/
$.ajaxSetup({
	'type': 'POST'
});

/**
* 
* @file js common.inc
*
* @param brandHTMLId The id of the input for the vehicle brand
* @param modelHTMLId The id of the input for the vehicles model
* @param function complete The function that will be called at the
* stage of completion
* @return void | boolean
*/
function BrandForModel(brandHTMLId, modelHTMLId, complete) {
	$("#" + brandHTMLId).change(function() {
		var carBrand = parseInt($(this).val());
		if (carBrand == '') {
			$('#' + modelHTMLId).html("").parent().hide();
		} else {
			/**
			 * any type : data
			 * string : textStatus
			 * jqXHR : jqXHR
			 */
			var success = function(data, textStatus, jqXHR) {
				$('#' + modelHTMLId).html(data);
			};

			/**
			 * jqXHR: jqXHR
			 * string : textStatus
			 * String: errorThrown
			 */
			var error = function(jqXHR, textStatus, errorThrown) {
				alert("Error: car model related errors");
			};

			$.ajax({
				'url': '<?= SiteURL?>',
				'async': true,
				'contentType': 'text/plain',
				'data': {
					'search/ajaxmodel': '',
					'brand': carBrand
				},
				'dataType': 'html',
				'type': 'GET',
				'success': success,
				'complete': complete,
				'error': error
			});
		}
		return true;
	});
}

if ($('#carbrand')) {
	function qSearch_Complete(data, textStatus, jqXHR) {
		if ($('#carmodel>option').length > 1) {
			$('#carmodel').fadeIn();
		} else {
			$('#carmodel').fadeOut();
		}
	}
	BrandForModel('carbrand', 'carmodel', qSearch_Complete);
}

$('#caryearfrom').change(function() {
	var options = $(this).find('option');
	var titleOption = options [0];
	var start = $(this).val();
	if (start === '') {
		$('#caryearto').html(NumberRangeOptions(end, start));
		return false;
	}
	var end = parseInt((new Date()).getFullYear());
	$('#caryearto').html(NumberRangeOptions(end, start));
});

// header-searchform.validation
$('#headersearchform').submit(function() {
	var getElements = $(this).find('select[name]');
	stop = true;
	getElements.each(function() {
		if ($(this).val() != '') {
			stop = false;
			return;
		}
	});
	if (stop) {
		return false;
	}
});

$('#headerloginform').submit(function(event) {
	var password = md5($(this).find('input[type=password]:eq(0)').val());
	$(this).find('input[type=password]:eq(0)').val(password);
	delete(password);
});

$('*[placeholder]').each(function() {
	if (($(this).val()).toLowerCase() !== ($(this).attr('placeholder')).toLowerCase()) {
		return false;
	}
	var defColor = $(this).css('color');
	$(this).click(function() {
		alert($(this).attr('placeholder'));
	}).focusin(function() {
		$(this).css('color', defColor).val('');
	}).focusout(function() {
		if ($(this).val() === '') {
			$(this).css('color', '#aaa').val($(this).attr('placeholder'));
		}
	});
});

$('select, input, button').css({
	'border-radius': '5px'
});

$('.adv-hidden-list>span').css({
	'border-radius': '0px 0px 25px 0px'
});