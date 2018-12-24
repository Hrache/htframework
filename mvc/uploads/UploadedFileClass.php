<?php
final class UploadedFileClass
{
	const file_size = "size";
	const file_name = "name";
	const file_error = "error";
	const file_tmpname = "tmp_name";
	const file_type = "type";
 	private $details = array();

	function __construct(array $uploadedFile)
	{
		$fileArray = $uploadedFile;
		$this->details = new ArrayHelpers ( $fileArray);
	}

	function __destruct ()
	{
		unlink ( $this->path);
	}
	
	function fileName(): string
	{
		return $this->details->getItem ( self::file_name);
	}
	
	function fileSize(): int
	{
		return $this->details->getItem ( self::file_size);
	}
	
	function fileType(): string
	{
		return $this->details->getItem ( self::file_type);
	}
	
	function fileError(): int
	{
		return $this->details->getItem ( self::file_error);
	}
	
	function fileTmpName(): string
	{
		return $this->details->getItem ( self::file_tmpname);
	}
	
	function setFileName ( $value): UploadedFileClass
	{
		$this->details->setItem ( self::file_name, $value);
		
		return $this;
	}
	
	function setTmpName ( $value): UploadedFileClass
	{
		$this->details->setItem ( self::file_tmpname, $value);
		
		return $this;
	}

	function setFileError ( $value): UploadedFileClass
	{
		$this->details->setItem ( self::file_error, $value);
		
		return $this;
	}

	function setFileType ( $value): UploadedFileClass
	{
		$this->details->setItem ( self::file_type, $value);
		
		return $this;
	}

	function setFileSize ( $value): UploadedFileClass
	{
		$this->details->setItem ( self::file_size, $value);
		
		return $this;
	}

	public function getFileDetail ( $index)
	{
		return $this->details->_item ( $index);
	}

	public function setFileDetail ( $index, $data): UploadedFileClass
	{
		$this->details->append ( $index, $data);

		return $this;
	}
}
?>