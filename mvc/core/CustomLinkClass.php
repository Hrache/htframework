<?php
/**
 * @author Max Pyger
 */
class CustomLinkClass extends LinkClass
{
	protected $page;
	protected $action;
	protected $pageUrl;
	protected $indexPage;
	/**
	 * Constructor of CustomLinkClass
	 * @param string $requestURI The URI of the current request
	 * @param string $indexPage The name of the index/home page
	 * @param mixed $delimiter CustomLinkClass has a delimiter option
	 * in the URI structure by default is '/'
	 */
	function __construct(string $requestURI, string $indexPage, $delimiter = '/')
	{
		parent::__construct($requestURI);

		$this->indexPage = $indexPage;

		$this->pageUrl = array_shift($this->getParams);

		$_ = explode($delimiter, array_shift($this->getParams));

		$this->page = ArrayClass::nonEmpty(array_shift($_), $this->indexPage);

		$this->action = array_shift($_) ?? '';

		unset($_);
	}

	function linkString(string $domain, string $indexFile = 'index.php', string $page, $action='', bool $secure = false, ArrayClass $params = null): string
	{
		if ($params)
		{
			$params = self::queryString($params->input);
		}

		return sprintf('http%s://%s/%s?%s/%s%s', ($secure)? 's' : '', $domain, $indexFile, $page ?? $this->page, $action ?? $this->action, $params);
	}

	/**
	 * @param string $page The page
	 * @param mixed $action The subpage/action of the request
	 * @param mixed $queryData The array of GET query data or ready string
	 * @return string The desired link string
	 */
	static function newLink(string $page, $action='', $queryData = ''): string
	{
		return sprintf('%s%s%s', $page, ($action)? '/' . $action: '', (is_array($queryData))? self::queryString($queryData): $queryData);
	}

	function actionIs(string $action): bool
	{
		return ($this->action === $action);
	}

	function getPage(): string
	{
		return $this->page;
	}

	function pageIs(string $page): bool
	{
		return ($this->page == $page);
	}

	function getAction(): string
	{
		return $this->action;
	}

	function setPage($page): CustomLinkClass
	{
		$this->page = $page;
		return $this;
	}

	function setAction($action)
	{
		$this->action = $action;
	}

	function getPageUrl()
	{
		return $this->pageUrl;
	}

	function setPageUrl($pageUrl)
	{
		$this->pageUrl = $pageUrl;
	}
}
