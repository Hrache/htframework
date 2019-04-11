/**
 * Function creates HTML Option DOM element and returns it
 * @param value
 * @param content
 * @return DOM Object
 */
function html_option(value, content) {
	return $('<option value="'+value+'">'+content+'</option>');
}

/**
 * Generates random text
 * @param {string} jQuery selector
 * @param {int} length The length of the random text
 * @returns {void} Writes data into the given element/s by the given selector
 */
function randtext(selector, length) {
	length = (length < 1)? 25 : length;
	$(selector).each(function()	{
		$(this).val(rword(Math.round(Math.random() * length)));
	});
}

/**
 * Automatically adopted the dimensions of the DOM block element to the screen
 * @param bool margin affects the left margin of the block object
 * @param bool width  affects the width of the block object
 * @returns array | string both margin & width | separately
 */
_responsive = function(margin, width) {
	var screenWidth = parseInt($('body').width());
	var result = {
		'width': null,
		'margin-left': null
	};
	result['width'] = '';
	result['margin-left'] = '';
	if (screenWidth > 1280)	{
		result['width'] = '960px';
		result['margin-left'] = ((screenWidth - 1024) / 2) + 'px';
	}
	else if (screenWidth > 1024) {
		result['width'] = '800px';
		result['margin-left'] = ((screenWidth - 800) / 2) + 'px';
	}

	if (width && margin) return (result);
	else if (width) return result['width'];
	else if (margin) return result['margin-left'];
};

/**
 * Turns input::hidden into an toggle button
 * @param string selector Wrapper of the button
 * @return void
 */
hiddenToButton = function(selector) {
	$(selector+'>span').each(function() {
		$(this).hover(function() {
			$(this).css('text-decoration', 'underline');
		},
		function() {
			$(this).css('text-decoration', 'none');
		})
		.click(function() {
			var valOfHidden = $(this).children(':input[type="hidden"]:first').val();
			switch (valOfHidden) {
				case ("0"): {
					$(this).css({
						'background-color': 'brown',
						'color': 'white'
					})
					.children(':input[type="hidden"]:first').val('1');

					break;
				}
				case ("1"): {
					$(this).css({
						'background-color': 'white',
						'color': 'black'
					})
					.children(':input[type="hidden"]:first').val('0');

					break;
				}
				default: {}
			}
		});
	});
};