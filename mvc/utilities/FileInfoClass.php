<?php
class FileInfoClass
{
	private $filepath;

	function __construct(string $file)
	{
		$this->filepath = $file;
	}

	function getFilepath(): string
	{
		return pathinfo($this->filepath, PATHINFO_DIRNAME);
	}

	function getFilename(): string
	{
		return pathinfo($this->filepath, PATHINFO_BASENAME);
	}

	function getFileext(): string
	{
		return pathinfo($this->filepath, PATHINFO_EXTENSION);
	}

	function getFilenamenoext(): string
	{
		return pathinfo($this->filepath, PATHINFO_FILENAME);
	}

	function getFilefullinfo(): array
	{
		return pathinfo($this->filepath);
	}

	function getFilesize(): int
	{
		return intval(filesize($this->filepath));
	}

	static function filedirname(string $filepath): string
	{
		return pathinfo($filepath, PATHINFO_DIRNAME);
	}

	static function filename(string $filepath): string
	{
		return pathinfo($filepath, PATHINFO_BASENAME);
	}

	static function fileextension(string $filepath): string
	{
		return pathinfo($filepath, PATHINFO_EXTENSION);
	}

	static function filenamenoext(string $filepath): string
	{
		return pathinfo($filepath, PATHINFO_FILENAME);
	}

	static function filesize(string $filepath): int
	{
		return intval(filesize($filepath));
	}
}
?>