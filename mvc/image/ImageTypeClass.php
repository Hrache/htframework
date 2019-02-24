<?php
abstract class ImageTypeClass {
 /**
  * Description of extensionVsMime
  * returns key/value extension/mime-type
  * @param string $data what data to return (
  *  'ext', 'mime',
  *  reserved extension, reserved mime
  * )
  * @return array (
  *  'ext': array of extensions
  *  'mime': array of mime-types
  *  reserved extension: returns mime of it, if it exists
  *  reserved mime: returns extention of it, if it exists
  * )
  **/
	static function extensionVsMime ( string $data = null, bool $dot = false) {
		$array = [
			'art' =>	'image/x-jg',
			'bm' =>	'image/bmp',
			'bmp' =>	'image/bmp',
			'bmp' =>	'image/x-windows-bmp',
			'jfif' =>	'image/jpeg',
			'jfif' =>	'image/pjpeg',
			'nap' =>	'image/naplps',
			'naplps' =>	'image/naplps',
			'dwg' =>	'image/vnd.dwg',
			'dwg' =>	'image/x-dwg',
			'dxf' =>	'image/vnd.dwf',
			'dxf' =>	'image/x-dwf',
			'jfif-tbnl' =>	'image/jpeg',
			'jpe' =>	'image/jpeg',
			'jpe' =>	'image/pjpeg',
			'fif' => 'image/fif',
			'jpeg' => 'image/jpeg',
			'jpeg' => 'image/pjpeg',
			'mcf' => 'image/vasa',
			'flo' => 'image/florian',
			'jps' =>	'image/x-jps',
			'g3' =>	'image/g3fax',
			'gif' =>	'image/gif',
			'ico' =>	'image/x-icon',
			'ief' => 'image/ief',
			'iefs' => 'image/ief',
			'nif' =>	'image/x-niff',
			'niff' =>	'image/x-niff',
			'pct' =>	'image/x-pict',
			'pcx' =>	'image/x-pcx',
			'pic' =>	'image/pict',
			'pict' =>	'image/pict',
			'pm' =>	'image/x-xpixmap',
			'png' => 'image/png',
			'ppm' => 'image/x-portable-pixmap',
			'qif' => 'image/x-quicktime',
			'qti' => 'image/x-quicktime',
			'qtif' =>	'image/x-quicktime',
			'rgb' => 'image/x-rgb',
			'svf' => 'image/vnd.dwg',
			'svf' => 'image/x-dwg',
			'tif' => 'image/tiff',
			'tif' => 'image/x-tiff',
			'tiff' =>	'image/tiff',
			'tiff' =>	'image/x-tiff',
			'turbot' => 'image/florian',
			'wbmp' =>	'image/vnd.wap.wbmp',
			'xbm' =>	'image/x-xbitmap',
			'xpm' =>	'image/x-xpixmap',
			'x-png' =>	'image/png',
			'xwd' =>	'image/x-xwd',
			'xwd' =>	'image/x-xwindowdump',
		];

		$exts = array_keys ( $array);
		$mimes = array_values ( $array);

		switch ($data) {
			case 'ext': {
				return $exts;
			}
			case 'mime': {
				return $mimes;
			}
			default: {
				if (isset($array[$data])) {
					return ($ext[$data]);
				}
				elseif (boolval(array_search($data, $array))) {
					return (array_search($data, $array));
				}
			}
		}
	}

	static function nonEmptyArray(): array {
		$args = func_get_args();
		$args['n_arr'] = array();

		foreach ($args as $i => $arr) {
			if (!empty($arr)) {
				$args['n_arr'][] = $args[$i];
			}
		}

		return $args['n_arr'];
	}

	static function imagePathToExtension ( string $imgPath): string {
		return image_type_to_extension ( exif_imagetype ( $imgPath)) ?? '';
	}

 /**
  * Description of extToIMAGETYPE
  * returns the php imagetype of the entered filename/file
  *
  * @param string $filename path or the filename of the image
  * @return int in case of 0 filetype is not supported
  **/

	static function extToIMAGETYPE ( string $filename): int {
		switch ( ImageInfoClass::fileextension ( $filename)) {
			case ( 'png'): {
				return IMAGETYPE_PNG;
			}
			case ( 'bmp'): {
				return IMAGETYPE_BMP;
			}
			case ( 'gif'): {
				return IMAGETYPE_GIF;
			}
			case ( 'wbmp'): {
				return IMAGETYPE_WBMP;
			}
			case ( 'jpg'):
			case ( 'jpeg'): {
				return IMAGETYPE_JPEG;
			}
			default: {
				return 0;
			}
		}
	}
}
?>
