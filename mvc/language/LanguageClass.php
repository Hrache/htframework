<?php
class LanguageClass
{
	private $dictionary = null;
	private $filePath = null;
	private $fileExtension = null;
	
	/**
	 * Constructor of the LanguageClass
	 * @param string $fileExtension The extension of language file
	 * @param string $filePath The path where language files are stored
	 * @return void
	 */
	function __construct(string $fileExtension, string $filePath)
	{
		$this->fileExtension = $fileExtension;
		$this->filePath = $filePath;
		$this->dictionary = new ArrayClass();
	}

	function getLangFileExtension()
	{
		return $this->settings->item(SettingsClass::LangFileExt);
	}

	function append(string ...$filename): LanguageClass
	{
		while ($filename)
		{
			$file = array_shift($filename);
			$file = realpath($this->filePath).DIRECTORY_SEPARATOR.$file.'.'.$this->fileExtension;
			$langData = require_once($file);
			$this->dictionary->append($langData);
		}

		return $this;
	}

	function setFilePath(string $langFileDir): LanguageClass
	{
		$this->filePath = $langFileDir;

		return $this;
	}

	function getWord($key)
	{
		return $this->dictionary->item($key);
	}

	function setWord($key, $value)
	{
		$this->dictionary->add($key, $value);
	}

	function getDictionary(): ArrayClass
	{
		return $this->dictionary;
	}
}
?>