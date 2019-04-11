<?php
class ImageInfoClass extends FileInfoClass {
	private $imagefullinfo;
	private $mimetype;
	private $width;
	private $height;

	function __construct(string $filepath) {
		parent::__construct($filepath);

		$this->imagefullinfo = getimagesize ( $filepath);
		$this->mimetype = $this->imagefullinfo ['mime'];
		$this->width = $this->imagefullinfo [0];
		$this->height = $this->imagefullinfo [1];
	}

	function getImagefullinfo (): Array {
		return $this->imagefullinfo;
	}

	function getMimetype (): string {
		return $this->mimetype;
	}

	function getWidth (): string {
		return $this->width;
	}

	function getHeight (): string {
		return $this->height;
	}

	static function fullimageinfo (string $filepath): Array {
		return getimagesize($filepath);
	}

	static function imagemimetype (string $filepath): string {
		return getimagesize($filepath)['mime'];
	}

	static function imagewidth (string $filepath): string {
		return getimagesize($filepath)[0];
	}

	static function imageheight ( string $filepath): string {
		return getimagesize($filepath)[1];
	}

	/**
	 * Description of is_image
	 *
	 * @param string $filepath the path of the image file
	 *
	 * @return bool true if is image, false - isn't
	 **/
	static function is_image ( string $filepath): bool {
		if (is_file($filepath)) {
			$imageinfo = in_array ( FileInfoClass::fileextension ( $filepath), ImageTypeClass::extensionVsMime ( 'ext'));
			return boolval($imageinfo);
		}

		return false;
	}
}
?>