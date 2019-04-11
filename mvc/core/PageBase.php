<?php
final class PageBase {
	/**
	 * @var string The HTML title of the web-page
	 */
	protected $title = '';

	/**
	 * @var string The filename of the template of the view
	 */
	protected $pageTemplateFile = '';

	/**
	 * @var string The current page-file
	 */
	protected $pagefile = null;

	/**
	 * @var string The directory where page-files are situated
	 */
	protected $websiteDir;

	/**
	 * @var string The path where snippets are stored
	 */
	protected $snippetsPath = null;

	/**
	 * @var string The extension of the page-file
	 */
	protected $fileExt;

	/**
	 * @var string The name of the default page-file
	 */
	protected $homepage;

	/*
	 * @var SnippetClass
	 */
	public $snippet;

	function __construct(string $page, string $homepage, string $fileExt = 'php') {
		$this->fileExt = $fileExt;
		$this->homepage = $homepage;
		$this->pagefile = ($page ?? $homepage).'.'.$fileExt;
	}

	function activateSnippets(string $snippetsPath, string $defaultSnippet): PageBase {
		$this->snippet = new SnippetsClass($defaultSnippet, $snippetsPath);
		return $this;
	}

	function getInstance(): PageBase {
		return $this;
	}

	function getTemplateFile(): string {
		return $this->pageTemplateFile;
	}

	function setTemplateFile(string $templateFile): PageBase {
		$this->pageTemplateFile = $templateFile;
		return $this;
	}

	function getPagefile(): string {
		return $this->pagefile;
	}

	function setPagefile(string $pagefile): PageBase {
		$this->pagefile = $pagefile;
		return $this;
	}

	function getSnippetsPath(): string {
		return $this->snippetsPath;
	}

	/**
	 * Inserts snippet into main HTML document
	 * @param string $file The name of the file or within extension, or without extension
	 * @param array $params Array of data that must be processed in the snippet
	 * @return bool true in case of success, false on opposite case
	 */
	function insertSnippet(string $file, array $params = []): bool {
		return($this->snippet->insert($file, $params));
	}

	function includePagefile(): bool {
		$filepath = $this->websiteDir.$this->pagefile;

		if (!file_exists($filepath)) {
			$filepath = $this->websiteDir . $this->homepage . '.' . $this->fileExt;
			if (!file_exists($filepath)) throw new Error('No such file found.');
		}

		return(boolval(require_once($filepath)));
	}

	function getTitle(): string	{
		return $this->title;
	}

	function setTitle(string $pageTitle): PageBase {
		$this->title = $pageTitle;
		return $this;
	}

	function setPagesDirectory(string $websiteDir): PageBase {
		$this->websiteDir = $websiteDir;
		return $this;
	}

	function render(): bool {
		return boolval(require_once($this->getTemplateFile()));
	}

	function getPageTemplateFile() {
		return $this->pageTemplateFile;
	}

	function getPagesDir() {
		return $this->pagesDir;
	}

	function getFileExt() {
		return $this->fileExt;
	}

	function setPageTemplateFile($pageTemplateFile): PageBase {
		$this->pageTemplateFile = $pageTemplateFile;
		return $this;
	}

	function setPagesDir($websiteDir): PageBase {
		$this->pagesDir = $websiteDir;
		return $this;
	}

	function setFileExt($fileExt): PageBase {
		$this->fileExt = $fileExt;
		return $this;
	}
}
?>