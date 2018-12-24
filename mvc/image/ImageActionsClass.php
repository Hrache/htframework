<?php
class ImageActionsClass
{
	private $imagePath;
	private $gdImageRs;
	private $imageinfo;

	function __construct(string $imagePath)
	{
		$this->imagePath = $imagePath;
	
		if (is_file($this->imagePath))
		{
			$this->imageinfo = new ImageInfoClass($this->imagePath);
		}
		
		$this->gdImageRs = self::initResourceStatic($imagePath);
	}

	/**
	 * Description of initResourceStatic
	 * @param string $image_path
	 * @return Resource gd resource image
	 **/
	static function initResourceStatic(string $image_path)
	{
		switch (ImageInfoClass::imagemimetype($image_path))
		{
			case (ImageInfoClass::IMAGE_PNG):
			{
				return @imagecreatefrompng($image_path);
			}
			case (ImageInfoClass::IMAGE_WBMP):
			{
				return @imagecreatefromwbmp($image_path);
			}
			case (ImageInfoClass::IMAGE_GIF):
			{
				return @imagecreatefromgif($image_path);
			}
			case (ImageInfoClass::IMAGE_JPEG):
			case (ImageInfoClass::IMAGE_JPG):
			default:
			{
				return @imagecreatefromjpeg($image_path);
			}
		}
	}

	function getImageInfo(): ImageInfoClass
	{
		return $this->imageinfo;
	}

	function setImageInfo(ImageInfoClass $imageInfo): ImageActionsClass
	{
		$this->imageinfo = $imageInfo;
	
		return $this;
	}
	
	function getImagePath()
	{
		return $this->imagePath;
	}
	
	function setImagePath($imagePath): ImageActionsClass
	{
		$this->imagePath = $imagePath;
	
		return $this;
	}
	
	function getGdImageRs()
	{
		return $this->gdImageRs;
	}
	
	function setGdImageRs($gdImageRs): ImageActionsClass
	{
		$this->gdImageRs = $gdImageRs;
		
		return $this;
	}
}
?>