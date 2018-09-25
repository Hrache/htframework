<?php
if (!is_dir($websiteDir))
{
	throw new ErrorHandler("Website wasn't found.");
}

$this->websiteDir = $websiteDir;
$pagefiles = scandir_c(realpath($websiteDir).DIRECTORY_SEPARATOR, true, false);
$this->pages = new ArrayClass();

if (!in_array($indexPage.'.'.$pagefileExtension, $pagefiles))
{
	throw new ErrorHandler('What an error.');
}

$pagefiles = new ArrayClass($pagefiles);

if ($pagefiles->length(0))
{
	throw new ErrorHandler('No pages to display.');
}

# Creating and storing names of the page-files of the given website directory into $this->pages
while (!$pagefiles->isEmpty())
{
	$_ = $pagefiles->pull();
	$_pFileExtension = FileInfoClass::fileextension($_->value);

	if (file_exists($websiteDir.$_->value) && ($_pFileExtension === $pagefileExtension))
	{
		$this->pages->add(dirname($_->value), $_->value);
	}
}

unset($pagefiles);