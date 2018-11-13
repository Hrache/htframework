<?php
class RequestClass extends CustomLinkClass
{
	protected $pages;
	protected $gets;
	protected $posts;
	protected $files;
	protected $linker;
	protected $websiteDir;

	/**
	  * @param string $websiteDir The directory of the web-site
	  * @param string $defaultLink The default link of the web-site
	  * @param string $indexPage The home/index-page of the web-site
	  * @param string $pagefileExtension The extension of the page file
	  */
	function __construct(string $websiteDir, string $defaultLink, string $indexPage, string $defaultAction, string $pagefileExtension = 'php')
	{
		require_once(realpath(__DIR__.'/../scripts').ds.'requestclass.php');

		parent::__construct($_SERVER['REQUEST_URI'], $indexPage, $defaultAction);

		# const SiteURL
		define('SiteURL', $_SERVER['PHP_SELF']);

		# const CurrentPage
		define('CurrentPage', $this->getPage());

		# const CurrentAction
		define('CurrentAction', $this->getAction());

		# const CurrentURL
		define('CurrentURL', SiteURL.'?'.CurrentPage.'/');
	}

	private function cleanupInputs()
	{
		$gbls = [$_POST, $_GET, $_FILES];

		while ($gbls)
		{
			$gbl = array_shift($gbls);

			if (!$gbl)
			{
				continue;
			}

			array_walk_recursive($gbl, function(&$v, $k)
			{
				$v = stringCleanup($v);
			});
		}

		unset($gbls);
	}

	/**
	 * Cleans up the content of the input globals
	 * @return void
	 */
	function handleGlobals()
	{
		$this->cleanupInputs();

		$this->gets = new ArrayClass($_GET);
		$this->posts = new ArrayClass($_POST);

		if ($_FILES)
		{
			$this->files = new ArrayClass($_FILES);
		}
	}

	function unHandleGlobals()
	{
		$this->gets = null;
		$this->posts = null;
		$this->files = null;
	}

	function postItem(string $index)
	{
		return($this->posts->item($index));
	}

	function setPost(string $index, string $value): RequestClass
	{
		$this->posts->add($index, $value);

		return $this;
	}

	function fileItem($index)
	{
		return $this->files->item($index);
	}

	function postExists($index): bool
	{
		return $this->posts->exists($index);
	}

	function getExists($index): bool
	{
		return $this->gets->exists($index);
	}

	function fileExists($index): bool
	{
		return $this->files->exists($index);
	}

	function filesCount(): int
	{
		return $this->files->length();
	}

	function fileInfo($index, $info_const)
	{
		return $this->fileItem($index)[$info_const];
	}

	function getFiles(): ArrayClass
	{
		return $this->files;
	}

	function setFiles(array $files): RequestClass
	{
		$this->files->replaceArray($files);

		return $this;
	}

	function getItem($index)
	{
		return $this->gets->item($index);
	}

	function addGet($index, $value = ''): RequestClass
	{
		$this->gets->add($index, $value);

		return $this;
	}

	function postsCount(): int
	{
		return $this->posts->length();
	}

	function getsCount(): int
	{
		return $this->gets->length();
	}

	function getPosts(): ArrayClass
	{
		return $this->posts;
	}

	function posts(): ArrayClass
	{
		return $this->posts;
	}

	function getGets(): ArrayClass
	{
		return $this->gets;
	}

	function withinPost(): bool
	{
		return (boolval($this->posts->length(0)));
	}

	function getPages()
	{
		return $this->pages;
	}

	function setPages($pages)
	{
		$this->pages = $pages;
	}

	function getLinker(): LinkClass
	{
		return $this->linker;
	}

	function setLinker($linker): RequestClass
	{
		$this->linker = $linker;

		return $this;
	}

	/**
	 * Gets rid of posted element by the given key
	 * @param ... $key The path to the array element
	 * @return RequestClass Returns current instance of this class
	 */
	function deletePost(...$key): RequestClass
	{
		$this->posts->del($key);

		return $this;
	}
}
?>