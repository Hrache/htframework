<?php
class ImageToolsClass {
	private $savedir = '';
	private $gdimage = null;
	private $modifiedfiles = [];
	private $imageInfoClassMimeType= null;
	private $imageInfo = null;
	const img_scale = 0;
	const img_convert = 1;

	function __construct(string $imageStore, string $savedir = '') {
		if (!is_dir($imageStore)) {
			throw new ExceptionClass(get_class($this), 20);
		}

		$this->path = $imageStore;

		if (boolval($savedir)) {
			if (!is_dir($savedir)) {
				$this->savedir = $this->path . $savedir . DIRECTORY_SEPARATOR;
			}
			else {
				$this->savedir = $savedir;
			}
		}
		else {
			$this->savedir = $this->path. 'images_'. uniqid(). DIRECTORY_SEPARATOR;
		}
	}

	/**
	 * Description of initResource
	 * @param string $image_path
	 * @return ImageToolsClass for method chaining
	 **/
	private function initResource(): ImageToolsClass {
		$this->imageinfo = new ImageInfoClass($this->path);
		$this->gdimage = self::initResourceStatic($this->path);
		return $this;
	}
 
	public static function initResourceStatic (string $filePath) {
		switch (exif_imagetype($filePath)) {
			case (IMAGETYPE_WBMP): {
				return imagecreatefromwbmp($filePath);
			}
			case (IMAGETYPE_PNG): {
				return imagecreatefrompng($filePath);
			}
			case (IMAGETYPE_GIF): {
				return imagecreatefromgif($filePath);
			}
			case (IMAGETYPE_JPEG): {
				return imagecreatefromjpeg($filePath);
			}
			default: {
				return false;
			}
		}
	}
	/**
	 * Description of singleResize
	 *
	 * @param int $width - new width of the image
	 * @param int $height - new height of the image
	 * @param bool $overwrite - overwrite the original one or no
	 *
	 * @return ImageToolsClass for method chaining
	 **/
	public function singleResize ( int $width = 0, int $height = 0, $quality = 75, bool $overwrite = true): bool {
		$this->imageinfo = new ImageInfoClass ( $this->path);
		if (!$overwrite) {
			if (!is_dir($this->savedir)) {
				@mkdir($this->savedir);
			}

			$filename = $this->imageinfo->getFilename();
			@copy ( $this->path, $this->savedir . $filename);
			$this->path = $this->savedir . $filename;
			unset ( $filename);
		}

		$this->modifiedfiles[] = $this->path;
		$this->initResource();
		
		if ($height == 0) {
			$this->gdimage = imagescale($this->gdimage, $width);
		}
		elseif ($width == 0) {
			$this->gdimage = imagescale($this->gdimage, 0, $height);
		}
		elseif ($height == 0 && $width == 0) {
			return false;
		}
		else {
			$this->gdimage = imagescale($this->gdimage, $width, $height);
		}

		$this->render();
		return true;
	}

	/**
	 * Description of multipleResize
	 * does the resize of the files of directory
	 * @param int $width new desired width of the image if 0 then height will be used
	 * @param int $height new desired height of the image
	 * @param $quality
	 * @return ImageToolsClass for method chaining
	 **/
	public function multipleResize ( int $width = 0, int $height = 0, $quality = null, bool $overwrite = true): ImageToolsClass {
		$old_path = $this->path;
		$_dir = scandir_c($this->path);

		foreach ( $_dir as $ind => $name) {
			$this->path = $old_path . $name;
			$this->singleResize ( $width, $height, $quality, $overwrite);
		}

		unset($old_path, $_dir);
		return $this;
	}
	/**
	 * Description of convert
	 * is able to convert from png, gif, bmp, jpeg, jpg
	 * to png, gif, bmp, jpeg, jpg
	 *
	 * @param string $path full path of the new file
	 * @param string $desiredMime one of the constants in ImageInfoClass
	 * @param gd resource $gdimagers already existing resource of gd
	 *
	 * @return void
	 **/
	public static function convertStatic ( string &$path, int $imgtype_const) {
		$imagers = false;

		if ( is_null ( $imagers = self::initResourceStatic ( $path))) {
			return false;
		}

		$newPath = dirname($path) . DIRECTORY_SEPARATOR . uniqid() . image_type_to_extension($imgtype_const, true);

		switch ($imgtype_const) {
	 		case (IMAGETYPE_BMP): {
				imagebmp ($imagers, $newPath); break;
			}
			case (IMAGETYPE_PNG): {
				imagepng ( $imagers, $newPath); break;
			}
			case ( IMAGETYPE_GIF): {
				imagegif ( $imagers, $newPath); break;
			}
			case (IMAGETYPE_WBMP): {
				imagewbmp ($imagers, $newPath); break;
			}
			case (IMAGETYPE_JPEG): {
				imagejpeg ($imagers, $newPath); break;
			}
			default: {
				return false;
			}
		}

		unlink($path);
		$path = $newPath;
	}

	/**
	 * Description of singleConvert
	 * is able to convert from png, gif, bmp, jpeg, jpg
	 * to png, gif, bmp, jpeg, jpg
	 *
	 * @param string $desiredMime one of the constants in ImageInfoClass
	 * @return void
	 **/
	function singleConvert($imagers) {
		self::convertStatic($this->path, $this->imageInfoClassMimeType, $imagers);
	}
	
 /**
	* Description of multipleConvert
	*
	*
	* @param string $imageInfoClassMimeType
	* @return void
	**/
	public function multipleConvert ( string $imageInfoClassMimeType) {
		foreach ($this->modifiedfiles as $i => $path) {
			self::convertStatic ( $this->modifiedfiles[$i], $imageInfoClassMimeType);
		}
	}

	/**
	 * Description of render
	 * creates image file by the given parameter
	 *
	 * @param string $filepath
	 *        by default is empty, which means the path
	 *        info of current resource image file will be
	 *        used for the new filename
	 * @return void
	 **/
	private function render ( string $filepath = '') {
		if ( ! empty ( $filepath)) {
			$this->path = $filepath;
		}

		switch ( exif_imagetype ( $this->path)) {
			case ( IMAGETYPE_PNG): {
				imagepng ( $this->gdimage, $this->path); break;
			}
			case ( IMAGETYPE_WBMP): {
				imagewbmp ( $this->gdimage, $this->path); break;
			}
			case ( IMAGETYPE_GIF): {
				imagegif ( $this->gdimage, $this->path); break;
			}
			case ( IMAGETYPE_JPEG): {
				imagejpeg ( $this->gdimage, $this->path); break;
			}
			case ( IMAGETYPE_BMP): {
				imagebmp ( $this->gdimage, $this->path); break;
			}
			default: {
				return false;
			}
		}
	}

	function getModifiedFiles(): array {
		return $this->modifiedfiles;
	}

	function setModifiedFiles ( array $new_filename): ImageToolsClass {
		$this->modifiedfiles = $new_filename;
		return $this;
	}

	function getSavedir(): string {
		return $this->savedir;
	}

	public function setSavedir ( string $savedir): ImageToolsClass {
		$this->savedir = $savedir;
		return $this;
	}

	function getMimeToConvertInto(): string {
		return $this->imageInfoClassMimeType;
	}

	function setMimeToConvertInto ( string $imageInfoClassMimeType): ImageToolsClass {
		$this->imageInfoClassMimeType = $imageInfoClassMimeType;
		return $this;
	}
}
?>