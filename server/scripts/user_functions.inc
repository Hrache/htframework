<?php
/**
 * Description of _redStar
 * prints out the html text red star as a sign of importance
 *
 * @return void
 */
function _redStar() {
	echo ("<b class='red-star'>*</b>");
}

/**
 * Description if checkedRadio
 * prints out the checked HTML attribute of HTML radio button
 * @param bool $condition should function print checked or no
 * @return string
 */
function checkedRadio(bool $condition): string {
	return (($condition) ? ' checked="checked"' : '');
}

/**
 * If data was sent as a checked checkbox it will return
 * attribute checked on the next request of a same page or on error
 * @param index string - key of the posted data
 * @return string
 */
function checkedPost(string $index): string {
	return (post_($index)) ? 'checked="checked" ' : '';
}

function errorCondition(string $errorIndex): bool {
	return (__('errors') && __('errors')->getSingleError($errorIndex));
}

/**
 * Description of formDataNames
 * @return string $requestArray
 */
function formDataNames(Array $requestArray): string {
	$keyList = '';

	foreach ($requestArray as $key => $val) {
		$keyList .= $key . PHP_EOL;
	}

	return $keyList;
}

/**
 * Description of html_nl
 * return html tag of the new line
 * @return string
 */
function html_nl(): string {
	return '<br/>';
}

/**
 * Description of dynPageTitle
 *
 *
 * */
function acs_PageTitle(string $text): void {
	__('page')->setTitle($text . ': ' . __('page')->getTitle());
}

/**
 * Creates main of a kind menu around current project
 * @param array $menulinks ['pageindex' => [
 *		string [getdata] get data for page,
 *		int|string [content] text-content of the anchor
 *		bool [display] display the item or not
 *		string [url] unique url in case of exception
 * ]]
 * @param array $attr [
 *  string [menu] menu wrapper class
 *  string [menu-item] menu item class
 *  string [id] menu wrapper
 *  string [active] class for active link
 *  string [page] the active page
 *  string [url] url of the page
 *  bool [vertical] decides weather menu is vertical ( true) or horizontal ( false)
 * ]
 */
function createmenu(array $menulinks, array $attr) {
	if (!isset($attr["menu"])) {
		$attr["menu"] = "";
	}

	if (!isset($attr["id"])) {
		$attr["id"] = "";
	}

	$items = '';

	foreach ($menulinks as $page => $link) {
		if (isset($link['display']) && !$link ['display']) {
			continue;
		}
		if (!isset($attr["menu-item"])) {
			$attr ["menu-item"] = '';
		}

		$itemClass = $attr["menu-item"];

		if (isset($attr['page']) && $page == $attr['page']) {
			$itemClass .= (isset($attr['active'])? ' '.$attr['active'] : '');
		}

		if (!isset($link["getdata"])) {
			$link["getdata"] = "";
		}
		else {
			$link["getdata"] = '&' . $link["getdata"];
		}

		if (!isset($attr["menu-item"])) {
			$attr["menu-item"] = "";
		}

		if (!isset($link["text"])) {
			$link["text"] = '';
		}

		$items .= sprintf(PHP_EOL . '<a href="%s" class="%s">%s</a>%s', (isset($link['url'])? $link['url'] : $attr['url'].$page.$link["getdata"]), $itemClass, $link["text"], ($attr['vertical']? '<br/>' : ''));
	}

	printf(PHP_EOL.'<span%s>%s</span>', $attr["menu"]? ' class="'.$attr["menu"].'"' : '', $items);
}

/**
 * The pathAndURL returns the array of file-system filepaths
 * and URLs of files of the given paths
 * @param string $path the path where files are stored
 * @param string $webDir web path without file (not web file path)
 * @return array file-system file-paths and URLs of the files in the directory
 * (use 'path', 'names' and 'url' to access corresponding information)
 */
function pathAndURL(string $path, string $webDir): array {
	$files = [
		'path' => $path,
		'url' => $webDir,
		'names' => scandir_c($path)
	];

	return $files;
}

/**
 * Generates HTML code within text for form fields that need description
 * @param ArrayClass $keyVal Some array of key-val pairs that will be returned
 * @param string $desclang The translation of the word 'Description'
 * @return string
 */
function ffDesc(ArrayClass $keyVal, string $desclang = 'Description'): string {
	$divcss = implode(';', [
		'padding: 1px 4px 4px 4px', 'max-width: 90%',
		'font-size: 12px'
	]);
	$desctext = [];

	while (!$keyVal->isEmpty()) {
		$i = $keyVal->pull();

		if (is_array($i->value)) {
			$i->value = implode(', ', $i->value);
		}

		$i->key = ucfirst($i->key);
		$desctext[$i->key] = $i->value;
	}

	return sprintf('<br/><span style="%s">%s: %s</span>', $divcss, ucfirst($desclang), implode(', ', $desctext));
}

/*
 * Checks whether the user is online or is guest
 * @return bool
 * */
function is_online(): bool {
	return boolval(__('session')->getCookie('account'));
}
?>
