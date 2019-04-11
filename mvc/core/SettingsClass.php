<?php
class SettingsClass {
	const DatabaseModule = 0x001;
	const DefaultDatabase = 0x002;
	const SnippetsModule = 0x003;
	const LanguageModule = 0x004;
	const SessionModule = 0x005;
	const TemplateFile = 0x006;
	const LangFileExt = 0x007;
	const PagefileExt = 0x008;
	const DefaultLang = 0x009;
	const Timezone = 0x110;
	const Homepage = 0x112;
	const DefaultAction = 0x113;
	const Errorpage = 0x114;
	const HandleGlobals = 0x115;
	const PreLoad = 0x116;
	const PostLoad = 0x117;
	const LinkClass = 0x118;
	const DefaultLink = 0x119;
	protected $settings;

	/**
	 * Constructor of the SettingsClass
	 * @param ArrayClass $settings The instance of ArrayClass within settings
	 */
	function __construct(ArrayClass $settings) {
		$this->settings = $settings;
	}

	/**
	 * Return the value of the current setting
	 * @param mixed $key The index of the setting in the list of settings
	 * @return mixed Returns mixed data
	 */
	function getSetting(...$key) {
		return $this->settings->item($key);
	}

	/**
	 * Sets value
	 */
	function setSetting($key, $value): SettingsClass {
		$this->settings->add($key, $value);

		return $this;
	}

	function appendSettings(Array $settings): SettingsClass {
		$this->settings->append($settings);

		return $this;
	}

	/**
	 * Turns on pre request desired functionality
	 * e.g. 'database', 'session', 'snippets', 'language'
	 * @param int $constSetting The class constant of SettingsClass
	 * @return SettingsClass The instance of the current object
	 */
	public function triggerModule(int $constSetting): SettingsClass {
		$this->settings->add($constSetting, true);

		return $this;
	}

	/**
	 * Sets the default database to the given one
	 * @param mixed $defaultDatabase The id for desired default database
	 * from an application
	 * @return SettingsClass
	 */
	public function setDefaultDatabase($defaultDatabase): SettingsClass {
		$this->settings->add(self::DefaultDatabase, $defaultDatabase);

		return $this;
	}
}
?>