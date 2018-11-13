<?php
class SnippetsClass
{
	/**
	 * @var string $path The path where snippets are stored
	 */
	private $path;

	/*
	 * @var string $extension The extension of the snippet file
	 * by default .phtml
	 */
	private $extension;
	
	/**
		* @var string $defaultSnippet The name of the default snippet
		*/
	private $defaultSnippet;

	/*
	 * @param $path
	 */
	public function __construct(string $defaultSnippet, string $path = '', string $extension = "phtml")
	{
		$this->path = $path;
		$extension = strtolower($extension);
		$this->defaultSnippet = $defaultSnippet;

		$this->setExtension($extension);
	}

	/*
	 * Inserts the desired snippet
	 * @param string $name The original name of snippet-file without extension
	 * @param array $params Data for being passed into the snippet
	 * @return bool On success true, failure: false
	 */
	function insert(string $name, array $params = []): bool
	{
		$_ = realpath($this->path).DIRECTORY_SEPARATOR.$name.$this->extension;

		return(require_once($_));
	}

	/*
	 * Setter for $path property
	 * @param string $path The desired path to the snippets
	 * @return SnippetsClass
	 */
	public function setPath(string $path): SnippetsClass
	{
		$this->path = $path;

		return $this;
	}

	/*
	 * Setter for $extension property
	 * @param string $extension The desired extension of the snippet file
	 * @return SnippetsClass
	 */
	function setExtension($extension): SnippetsClass
	{
		if ($extension[0] !== ".")
		{
			$extension=".".$extension;
		}

		$this->extension = $extension;

		return $this;
	}
}
?>