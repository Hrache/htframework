PygerJS =
{
	/**
		* Adds placeholder abbility to the appropriate elements
		* Call it from self-callable at DOMReady stage
		* @return void
		*/
	activatePlaceholders: function()
	{
		$('input[alt]').each(function()
		{
			var theAlt = $(this).attr('alt');
			var defColor = $(this).css('color');
			var defFSize = $(this).css('font-size');

			$(this).css(
			{
				"color": "#aaa",
				"font-size": defFSize
			}).val(theAlt);

			$(this).focusin(function()
			{
				if (($(this).val()).toLowerCase() !== (theAlt).toLowerCase())
				{
					return false;
				}

				$(this).css(
				{
					'color': defColor,
					"font-size": "120%"
				}).val('');
			})
			.focusout(function()
			{
				if ($(this).val() === '')
				{
					$(this).css(
					{
						"color": "#aaa",
						"font-size": defFSize
					}).val(theAlt);
				}
			});

			delete(theAlt);
		});
	},

	/**
		* Generates random text
		* @param string selector The jquery selector
		*/
	randomText: function(selector, length)
	{
		var length = (length < 1) ? 25 : length;

		$(selector).each(function()
		{
			$(this).val(PygerJS.randomWord(length));
		});
	},

	randomWord: function(length)
	{

	},

	/**
		* Generates text data within random characters
		* @param int maxlength The length of the returnable text data
		* @param string lang Possible values ('en', 'ru', 'arm')
		*/
	StrongPassword: function(maxlength, lang)
	{
		var langs =
		{
			'en':
			[
				"abcdefghijklmnopqrstuvwxyz",
				"ABCDEFGHIJKLMNOPQRSTUVWXYZ"
			],
			'arm':
			[
				"աբգդեզէըթժիլխծկհձղճմյնշոչպջռսվտր�?ւփքևօֆ",
				"ԱԲԳԴԵԶԷԸԷԺԻԼԽԾԿՀ�?ՂՃՄՅՆՇՈՉՊՋՌ�?Վ�?�?ՑՒՓՔևՕՖ"
			],
			'ru':
			[
				"абвгдеежзийклмнопр�?туфхцчшщыь�?ю�?",
				"�?БВГДЕЕЖЗИЙКЛМ�?ОПРСТУФХЦЧШЩЫЬЭЮЯ"
			]
		};

		if (!langs[lang])
		{
			lang = 'en';
		}

		this.generate = function()
		{
			var wdata = "";
			var chars_def = new Array(langs[lang][0], langs[lang][1], ",.`~!@#$%^&*()-_=+{}[]|\\;:\'\"<>", "0123456789");

			for (i = 0; i < maxlength; i++)
			{
				el = Math.round(Math.random() * (chars_def.length - 1));
				wdata += chars_def[el][Math.round(Math.random() * (chars_def[el].length - 1))];
			}

			return wdata;
		};
	},

	/**
		* Does post request by the given form action
		* @param string url The url by which the request will be done
		* @param object data Key value pair of data for being sent
		* @return void
		*/
	requestPost: function(url, data)
	{
		var form = $('<form></form>').attr(
		{
			'action': url,
			'method': "post",
			'id': 'fakepost'
		});

		for (item in data)
		{
			var i = $('<input/>');

			i.attr(
			{
				'type': 'hidden',
				'name': item,
				'value': data[item]
			}).appendTo(form);
		}

		$('body').append(form);

		form.submit();
	},

	/**
		* Does alert and return
		* @param {string} message The text to print out
		* @param {bool} exit description
		* @return
		*/
	doboog: function(message, exit)
	{
		alert(message);

		if (exit)
		{
			return false;
		}
	},

	/**
		* Wizard step dependant jQuery progress bar
		* @param {jQuery} wrapperr The element which will be appended
		* @param {obj} steps The list of objects that trugger the progress
		*/
	UIWizardProgressBar: function(wrapperr, steps)
	{
		var wrapper = $('<div></div>').css(
		{
			'padding': '1%',
			'max-width': '98%',
			'width': '96%',
			'background-color': '#f0f0f0',
			'border': '1% solid #999999',
			'display': 'block'
		});
		var bar = $('<div></div>').css(
		{
			'width': '100%',
			'max-width': '100%',
			'background-color': 'white'
		});
		var progress = $('<div></div>').css(
		{
			'width': '0%',
			'max-width': '100%',
			'max-height': '20px',
			'height': '20px',
			'background-color': 'orange'
		})
		.attr('id', 'progressdiv');

		wrapper.append(bar);

		bar.append(progress);

		wrapper.insertAfter(wrapperr);

		/**
		 * @param {int} step The number of steps to fill
		 */
		this.trigger = function(step)
		{
			var move = (100/steps)*step+'%';

			$('#progressdiv').animate({'width': move}, 400);
		};
	},

	/**
	 * Use this to turn desired object onto movable
	 * @param {jQuery object} jObj The desired jQuery object
	 * @returns {void}
	 */
	UIMovableCallback: function(jObj)
	{
		jObj.mouseup(function(eo)
		{
			$(this).parent().unbind('mousemove');
		})
		.mousedown(function(eo)
		{
			mouseDiffX = parseInt(eo.pageX) - parseInt(jObj.parent().css('left'));
			mouseDiffY = parseInt(eo.pageY) - parseInt(jObj.parent().css('top'));

			$(this).parent().bind('mousemove', function(eo)
			{
				jObj.parent().css(
				{
					'left': parseInt(eo.pageX) - mouseDiffX,
					'top': parseInt(eo.pageY) - mouseDiffY
				});
			});
		});
	},

	/**
		* jQuery CloseButton
		* @param {string} id The DOM id of the desired element
		* @param {function} callback Click callback that will be specified
		* to the programmer's given object
		* @returns {jQuery object} Returns the closeButton
		*/
	UICloseButton: function(id, callback)
	{
		return $('<span></span>').attr('id', id).text('x')
		.css(
		{
			'display': 'inline-block',
			'padding': '1%',
			'margin': '1%',
			'width': 'auto',
			'color': 'white',
			'font-size': '12pt',
			'cursor': 'pointer'
		})
		.click(callback);
	},

	PopupMessage: function(text)
	{
		if (document.getElementById('tagel'))
		{
			document.getElementById('tagel').innerHTML += text;

			return;
		}

		var pygerpopup = document.createElement("pre");
		pygerpopup.style.visibility = "visible";
		pygerpopup.style.display = "block";
		pygerpopup.style.position = "fixed";
		pygerpopup.style.padding = "2.5%";
		pygerpopup.style.fontSize = "130%";
		pygerpopup.style.fontWeight = "bold";
		pygerpopup.style.lineHeight = "150%";
		pygerpopup.style.minWidth = "auto";
		pygerpopup.style.maxWidth = "90%";
		pygerpopup.style.maxHeight = "50%";
		pygerpopup.style.color = "black";
		pygerpopup.style.borderRadius = "10px";
		pygerpopup.style.zIndex = "3";
		pygerpopup.style.textAlign = "left";
		pygerpopup.style.wordWrap = "break-word";
		pygerpopup.style.overflow = "scroll";
		pygerpopup.style.backgroundColor = "white";
		pygerpopup.id = "tagel";
		pygerpopup.innerHTML = text;
		pygerpopup.style.filter = "drop-shadow(0px 0px 2px skyblue)";
		pygerpopup.onclick = function()
		{
			this.style.display = 'none';

			document.body.removeChild(this);

			delete(this);
		};
		pygerpopup.style.top = "25%";
		pygerpopup.style.left = "5%";

		document.body.appendChild(pygerpopup);
	},

	range: function(start, end)
	{
		var i = Math.min(start, end);
		var range = [i];

		while (i < Math.max(start, end))
		{
			i++;
			range.push(i);
		}

		return range;
	},

	NumberRangeOptions: function(start, end, reverse)
	{
		var range = PygerJS.range(start, end);

		if (reverse === undefined)
		{
			reverse = false;
		}

		if (reverse)
		{
			range.reverse();
		}

		var options = '';

		while (range.length)
		{
			var i = Array.pop(range);
			options += '<option value="'+i+'">'+i+'</option>';
		}

		delete(range);

		return options;
	}
};

DOMHelpersJS =
{
	div: '<div></div>',
	span: '<span></span>',
	option: '<option></option>'
};

/**
 * @param {string} id The id of the observable element
 * @returns {DOMElement} The observable element
 */
function getById(id)
{
	if (!id)
	{
		alert('No id was given.');

		return false;
	}

	return document.getElementById(id);
}
