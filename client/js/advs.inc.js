ArmCarShopJS.BrandForModel('carbrand_', 'carmodel_', SiteURL+'?advertisements/async_img_uploads', function (data, textStatus, jqXHR)
{
	if ($('#carmodel_>option').length <= 1)
	{
		$('#carmodelman').show();
		$('#carmodel_').hide();
	}
	else
	{
		$('#carmodelman').hide();
		$('#carmodel_').show();
	}

	if (!$('#carbrand_').val())
	{
		$('#carmodelman').hide();
		$('#carmodel_').hide();
	}
});

$('#vehicleimgs').change(function()
{
	var fileInputName = $(this).attr('name');

	$.ajax(
	{
		'type': 'POST',
		'url': SiteURL,
		'async': true,
		'contentType': 'text/plain',
		'dataType': 'text',
		'data':
		{
			fileInputName: $(this).val()
		},
		'success': function (data, textStatus, jqXHR)
		{
			$('#uploadedImages').html(data);
		},
		'error': function (jqXHR, textStatus, errorThrown)
		{
			alert(textStatus);
		}
	});
});

$('#newadvform').submit(function()
{
	$('<div></div>').append($(this)).css(
	{
		'position': 'fixed',
		'top': '10%',
		'left': '10%'
	}).text($(this).serialize());
	$(this).preventDefault();
});

hiddenToButton('.adv-hidden-list');