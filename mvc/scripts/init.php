<?php
lib_load('db', 'db\mysql');
class_alias('ArrayClass', 'arrayc');
class_alias('DatabaseClass', 'dbclass');
require_once(Server.'settings.php');

# Settings
$settings = new FinalSettings();

# Timezone
date_default_timezone_set($settings->getSetting(SettingsClass::Timezone) ?? 'Europe/London');

# Request
$request = new RequestClass(
	Project,
	$settings->getSetting(SettingsClass::DefaultLink),
	$settings->getSetting(SettingsClass::Homepage),
	$settings->getSetting(SettingsClass::DefaultAction),
	$settings->getSetting(SettingsClass::PagefileExt)
);

# request
_d8('request', $request);

# Globals reset
if ($settings->getSetting(SettingsClass::HandleGlobals)) {
	$request->handleGlobals();
}

# Session
if ($settings->getSetting(SettingsClass::SessionModule) instanceof ArrayClass) {
	$session = new SessionClass($settings->getSetting(SettingsClass::SessionModule));

	if (!$session->cookieExists('lastaction') || !equal($session->get('lastaction'), CurrentAction)) {
		$session->add('lastaction', CurrentAction);
	}
}

# Page
$page = new PageBase(
	$request->getPage(),
	$settings->getSetting(SettingsClass::Homepage),
	$settings->getSetting(SettingsClass::PagefileExt)
);

# Preload
if ($settings->getSetting(SettingsClass::PreLoad)) {
	require_once(Server.$settings->getSetting(SettingsClass::PreLoad));
}

# Snippets Module
if ($settings->getSetting(SettingsClass::SnippetsModule)) {
	$page->activateSnippets(Snippets, $settings->getSetting(SettingsClass::DefaultAction));
}

# Database Module
if ($settings->getSetting(SettingsClass::DatabaseModule) instanceof arrayc) {
	$dbroot = new DatabaseClass(
		$settings->getSetting(SettingsClass::DatabaseModule)->item($settings->getSetting(SettingsClass::DefaultDatabase)),
		SettingsClass::DefaultDatabase
	);
}

# Language Module
if ($settings->getSetting(SettingsClass::LanguageModule)) {
	lib_load('language');

	# Predefined constant "Lang"
	define('Lang', ArrayClass::nonEmpty($request->getItem('lang'), $session->getCookie('lang'), $settings->getSetting(SettingsClass::DefaultLang)));

	# Predefined constant "LangDir"
	define('LangDir', Languages.Lang.DIRECTORY_SEPARATOR);

	$session->setCookie('lang', Lang);

	if (!$request->getExists('lang')) {
		$request->addGet('lang', Lang);
	}

	$language = new LanguageClass($settings->getSetting(SettingsClass::LangFileExt), LangDir);
	$language->append('system');
}

# settings
_d8('settings', $settings);

# session
_d8('session', $session);

# page
_d8('page', $page);

# dbroot
_d8('dbroot', $dbroot);

if (__('dbroot') instanceof DatabaseClass) {
	
	# database - Database connection
	_di('database', __('dbroot')->connect());
}

# language - language data
_d8('language', $language);

require_once('corefunctions.php');

// core.post.load
if ($settings->getSetting(SettingsClass::PostLoad)) {
	require_once(Server.$settings->getSetting(SettingsClass::PostLoad));
}

// pagefile
$page->setPagesDirectory(Project)->includePagefile();

$cpage = new PageClass();

# cpage - current page
_d8('cpage', $cpage);

// render
if (!$page->getTemplateFile()) {
	$page->setTemplateFile(Client.$settings->getSetting(SettingsClass::TemplateFile));
}

$page->render();

if ($dbroot) {
	$dbroot->close();
}
?>