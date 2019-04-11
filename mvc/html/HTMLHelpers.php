<?php
class HTMLHelpers {
	/**
	* Generates HTML Link element within given data for CSS
	* @param string $href The HREF part of the link element
	* @return string Returns the HTML code of the HTML Link element for CSS only
	*/
	static function CSSLink(string $href): string {
		return sprintf('<link href="%s" type="text/css" rel="stylesheet" />' . PHP_EOL, $href);
	}

	/**
	* Generates HTML Script element within given data for Java Script
	* @param string $src The source part of the script element
	* @return string Returns the HTML code of the HTML Script element for Java Script only
	*/
	static function JSScript(string $src): string {
		return sprintf('<script src="%s" type="text/javascript"></script>' . PHP_EOL, $src);
	}

	static function HTMLPrint(ArrayClass $data) {
		$ul = PHP_EOL . '<br><ul>%s</ul>';
		$li = '';
		while (!$data->isEmpty()) {
			$di = $data->pull();
			$li .= sprintf(PHP_EOL . '<li><strong>%s</strong><br/>%s</li>' . PHP_EOL, $di->key, $di->value);
		}

		printf($ul, $li);
	}

	/**
	 * Generates HTML Form Option element within given data
	 * @param mixed $value The value part of the Option
	 * @param mixed $text The text data of the option
	 * @param bool $selected Decides is the option selected one (by default false)
	 * @return string Returns the HTML code of the HTML Option element
	 */
	static function DOMOption($value, $text, bool $selected = false): string {
		return sprintf('<option value="%s"%s>%s</option>'.PHP_EOL, $value, (($selected) ? ' selected' : ''), $text);
	}

	/**
	 * Generates HTML Form Checkbox element within given data
	 * @param mixed $name The name of the chcekbox
	 * @param mixed $value The value of the checkbox
	 * @param boolean $check Decides wheather checkbox is checked or no
	 * @param string $title A title for checkbox
	 * @return string Returns HTML code of DOM element
	 */
	static function DOMCheckBox($name, $value, $check = false, $title): string {
		return sprintf('<span><input type="checkbox" name="%s" value="%s" %s/>%s</span>', $name, $value, $check? 'checked': '', $title);
	}

	/**
	 * Generates HTML Form Radio element within given data
	 * @param mixed $name The name part of the Option
	 * @param mixed $value The value part of the Radio (by default '')
	 * @param bool $checked Decides is the radio selected one (by default false)
	 * @return string Returns the HTML code of the HTML Radio element
	 */
	static function DOMRadioInput($name, $value = '', bool $checked = false): string {
		return sprintf(PHP_EOL . '<input type="radio" name="%s" value="%s"%s/>' . PHP_EOL, $name, $value, ($checked) ? ' checked' : '');
	}

	static function LineBreak(): string {
		return '<br/>';
	}

	/**
	 *
	 *
	 */
	static function DOMSelect(string $options, $id = '', string $name = ''): string {
		return sprintf( '<select%s%s>%s</select>', $id? ' id="' . $id . '"': $id, $name? ' name="' . $name . '"': $name, $options);
	}
}
?>