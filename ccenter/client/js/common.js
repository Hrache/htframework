$('#links span').each(function()
{
	var animSpeed = 250;
	var bgColor = HracheJS.randomCSSRGB(64, 192);

	$(this).css('background-color', bgColor)
	.mouseenter(function()
	{
		$(this).animate(
		{
			'bottom': '0px'
		}, animSpeed);
	})
	.mouseout(function()
	{
		$(this).animate(
		{
			'bottom': '-64px'
		}, animSpeed);
	});
});