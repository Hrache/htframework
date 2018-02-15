/**
 * Description of rword
 * generates random information
 * @param maxlength
 *
 * @return string
 **/
function rword(maxlength) {
 var wdata = "";
 var chars = new Array(
         "abcdefghijklmnopqrstuvwxyz",
         "ABCDEFGHIJKLMNOPQRSTUVWXYZ",
         "աբգդեզէըթժիլխծկհձղճմյնշոչպջռսվտրցւփքևօֆ",
         "ԱԲԳԴԵԶԷԸԷԺԻԼԽԾԿՀՁՂՃՄՅՆՇՈՉՊՋՌՍՎՏՐՑՒՓՔևՕՖ",
         "абвгдеежзийклмнопрстуфхцчшщыьэюя",
         "АБВГДЕЕЖЗИЙКЛМНОПРСТУФХЦЧШЩЫЬЭЮЯ",
         ",.`~!@#$%^&*()-_=+{}[]|\\;:\'\"<>",
         "0123456789");

 for (i = 0; i < maxlength; i++) {
  el = Math.round(Math.random() * (chars.length - 1));
  wdata += chars [el][Math.round(Math.random() * (chars [el].length - 1))];
 }

 return wdata;
}

/**
 * Description of html_option
 * function creates HTML Option DOM element and returns it
 * @param value
 * @param content
 * @return DOM Object
 *
 **/
function html_option(value, content) {
 return $('<option value="' + value + '">' + content + '</option>');
}

function randtext(selector, length) {
 length = (length < 1) ? 25 : length;

 $(selector).each(function() {
  $(this).val(rword(Math.round(Math.random() * length)));
 });
}

/**
 * Description of responsive_parameters
 * automatically adopted the dimensions of the DOM block element to the screen
 * @param bool margin affects the left margin of the block object
 * @param bool width  affects the width of the block object
 * @returns array | string both margin & width | separately
 **/
function _responsive(margin, width) {
 var screenWidth = parseInt($('body').width());
 var result = {
  'width': null,
  'margin-left': null};
 result ['width'] = '';
 result ['margin-left'] = '';

 if (screenWidth > 1280) {
  result ['width'] = '960px';
  result ['margin-left'] = ((screenWidth - 1024) / 2) + 'px';
 } else if (screenWidth > 1024) {
  result ['width'] = '800px';
  result ['margin-left'] = ((screenWidth - 800) / 2) + 'px';
 }

 if (width && margin) {
  return (result);
 } else if (width) {
  return result ['width'];
 } else if (margin) {
  return result ['margin-left'];
 }
}

function NumberRangeOptions(start, end) {
 var options = '';
 var selected = start;

 switch (start < end) {
  case (true):
  {
   while (start <= end) {
    options += '<option value="' + start + '"' + ((selected == start) ? ' selected' : '') + '>' + start + '</option>';
    start++;
   }
   break;
  }
  default:
  {
   while (start >= end) {
    options += '<option value="' + start + '"' + ((selected == start) ? ' selected' : '') + '>' + start + '</option>';
    start--;
   }
  }
 }

 return options;
}

/**
 * Turns input::hidden into an toggle button
 *
 * @param string selector The selector string of the wrapper
 *                        of the input::hidden
 * @return void
 */
function hiddenToButton(selector) {
 $(selector + '>span').each(function() {
  $(this).hover(function() {
   $(this).css({
    'text-decoration': 'underline'
   });
  }, function() {
   $(this).css({
    'text-decoration': 'none'
   });
  }).click(function() {
   var valOfHidden = $(this).children(':input[type="hidden"]:first').val();
   switch (valOfHidden) {
    case ("0"):
    {
     $(this).css({
      'background-color': 'brown',
      'color': 'white'
     }).children(':input[type="hidden"]:first').val('1');
     break;
    }
    case ("1"):
    {
     $(this).css({
      'background-color': 'white',
      'color': 'black'
     }).children(':input[type="hidden"]:first').val('0');
     break;
    }
    default:
    {
    }
   }
  });
 });
}