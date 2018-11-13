<?php
class SettingsClass
{
	const DatabaseModule = 0x101;
	const DefaultDatabase = 0x1011;
	const SnippetsModule = 0x102;
	const LanguageModule = 0x103;
	const SessionModule = 0x107;
	const TemplateFile = 0x100;
	const LangFileExt = 0x104;
	const PagefileExt = 0x105;
	const DefaultLang = 0x106;
	const Timezone = 0x108;
	const Homepage = 0x1090;
	const DefaultAction = 0x1091;
	const Errorpage = 0x110;
	const HandleGlobals = 0x111;
	const PreLoad = 0x112;
	const PostLoad = 0x113;
	const LinkClass = 0x115;
	const DefaultLink = 0x117;
	protected $settings;

	/**
	 * Constructor of the SettingsClass
	 * @param ArrayClass $settings The instance of ArrayClass within settings
	 */
	function __construct(ArrayClass $settings)
	{
		$this->settings = $settings;
	}

	/**
	 * Return the value of the current setting
	 * @param mixed $key The index of the setting in the list of settings
	 * @return mixed Returns mixed data
	 */
	function getSetting(...$key)
	{
		return $this->settings->item($key);
	}

	/**
	 * Sets value
	 */
	function setSetting($key, $value): SettingsClass
	{
		$this->settings->add($key, $value);

		return $this;
	}

	function appendSettings(Array $settings): SettingsClass
	{
		$this->settings->append($settings);

		return $this;
	}

	/**
	 * Turns on pre request desired functionality
	 * e.g. 'database', 'session', 'snippets', 'language'
	 * @param int $constSetting The class constant of SettingsClass
	 * @return SettingsClass The instance of the current object
	 */
	public function triggerModule(int $constSetting): SettingsClass
	{
		$this->settings->add($constSetting, true);

		return $this;
	}

	/**
	 * Sets the default database to the given one
	 * @param mixed $defaultDatabase The id for desired default database
	 * from an application
	 * @return SettingsClass
	 */
	public function setDefaultDatabase($defaultDatabase): SettingsClass
	{
		$this->settings->add(self::DefaultDatabase, $defaultDatabase);

		return $this;
	}
}
?>