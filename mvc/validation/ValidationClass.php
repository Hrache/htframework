<?php
/**
 * Framework/validation/ValidationClass
 * This final class is responsible for providing methods
 * for data validation. The idea of it is to prepare all validatible
 * data into an array and at the final stage validate the whole list.
 */
final class ValidationClass
{
	// @var string The enumaration content of the table's field
	const VALIDATION_ENUM_MYSQL = 'enum';

	// @var string The type of the table's field
	const VALIDATION_TYPE_MYSQL = 'type';

	// @var string The length of the field
	const VALIDATION_LENGTH_MYSQL = 'length';

	// @var string The type extra information of the field
	const VALIDATION_EXTRA_MYSQL = 'type_extra';

	// @var string Is the field NULL or no
	const VALIDATION_NULL_MYSQL = 'null';

	// @var string The default value of the field
	const VALIDATION_DEFAULT_MYSQL = 'default';

	// @var string Error for the type of the text
	const VALIDATION_ERROR_TEXT = 'text_error';

	// @var string Error for the type of numeric
	const VALIDATION_ERROR_NUMERIC = 'numeric_error';

	// @var string Length related error
	const VALIDATION_ERROR_LENGTH = 'length_error';

	// @var string Extra information related error of the field
	const VALIDATION_ERROR_EXTRA = 'extra_error';

	// @var string Null information error
	const VALIDATION_ERROR_NULL = 'null_error';

	// @var string Default value error of the field
	const VALIDATION_ERROR_DEFAULT = 'default_error';

	// @var string Date formats
	const DATE_FORMAT_1 = 'DD MM YYYY';

	const DATE_FORMAT_2 = 'MM DD YYYY';

	const DATE_FORMAT_3 = 'YYYY DD MM';

	const DATE_FORMAT_4 = 'YYYY MM DD';

	/**
     * @var ArrayClass The list of validation entries
     */
	private $entries;

	function __construct()
    {
		$this->еntries = new ArrayClass();
	}

	/**
	 * Adds new entry (ValidationEntry object) to the set of entries
	 * @param ValidationEntry $entry An instance of ValidationEntry class
	 * @return ValidationClass
	 */
	function addEntry(ValidationEntry $entry): ValidationClass
    {
		$this->entries->add($entry->getName(), $entry);

		return $this;
	}

	/**
	 * Adds email validation entry
	 * @param string $domname The index of the entry
	 * @param mixed $value Not validated value of the entry
	 * @param mixed $cofirmValue Data for confirmation
	 * @return ValidationClass
	 */
	function addEmail(string $domname, $value, $cofirmValue): ValidationClass
    {
		$entry = new ValidationEntry($domname, $value);

		$entry->addRule(ValidationEntry::RuleRegEx, ValidationBase::Email2);

		$entry->addRule(ValidationEntry::TypeConfirm, $confirmValue);

		return $this->addEntry($domname, $entry);
	}

	/**
	 * Adds password validation entry
	 * @param string $domname The index of the entry
	 * @param mixed $value Value for being validated
	 * @param mixed $cofirmValue Data for confirmation
	 * @return ValidationClass
	 */
	function addPassword(string $domname, $value, $cofirmValue): ValidationClass
    {
		$entry = new ValidationEntry($domname, $value);

		$entry->addRule(ValidationEntry::TypeConfirm, $confirmValue);

		return $this->addEntry($domname, $entry);
	}

	/**
	* Adds radio validation entry
	* @param string $domname The index of the element (identifier)
	* @param mixed $value The data for being validated
	* @return ValidationClass
	*/
	function addRadio(string $domname, $value): ValidationClass
    {
		$entry = new ValidationEntry($domname, $value);

		// TODO: Radios are for comparison with the data-source data
		// so when you add rule for it you need to provide data-source
		return $this->addEntry($domname, $entry);
	}

	/**
	* Adds URL validation entry
	* @param string $domname The index of the element (identifier)
	* @return ValidationClass
	*/
	function addUrl(string $domname, $value): ValidationClass
    {
		$entry = new ValidationEntry($domname, $value);

		$entry->addRule(ValidationEntry::RuleRegEx, ValidationBase::URL);

		return $this->addEntry($domname, $entry);
	}

	/**
	* Adds select validation entry
	* @param string $domname The index of the element (identifier)
	* @param mixed $value The value of the entry for being validated
	* @return ValidationClass
	*/
	function addSelect(string $domname, $value): ValidationClass
    {
		$entry = new ValidationEntry($domname, $value);

		// TODO: expects data-source solution
		return $this->addEntry($entry);
	}

	/**
	* Adds numeric validation entry
	* @param string $domname The index of the element (identifier)
	* @param mixed $value The value of the entry for being validated
	* @param int $minLength The minimal length of the value
	* @param int $maxLength The maximum length of the value
	* @return ValidationClass
	*/
	function addNumeric(string $domname, $value, int $minLength = 0, int $maxLength = 0): ValidationClass
    {
		$entry = new ValidationEntry($domname, $value);

		$entry->addRule(ValidationEntry::RuleRegEx, ValidationBase::Digits);

		$entry->addRule(ValidationEntry::RuleRange, [$minLength, $maxLength]);

		return $this->addEntry($entry);
	}

	/**
	* Adds text entry type of simple for validation
	* this are consist only of - letters and spaces
	* @param string $domname The index of the element (identifier)
	* @param mixed $value The value of the entry for being validated
	* @param int $minLength The minimal length of the value
	* @param int $maxLength The maximum length of the value
	* @return ValidationClass
	*/
	function addSimpleString(string $domname, string $value, int $minLength = 0, int $maxLength = 0): ValidationClass
    {
		$entry = new ValidationEntry($domname, $value);

		$entry->addRule(ValidationEntry::RuleRegEx, ValidationBase::SimpleString);

		$entry->addRule(ValidationEntry::RuleRange, [$minLength, $maxLength]);

		return $this->addEntry($entry);
	}
	/**
	 * Adds text entry type of normal for validation this are
	 * consist of characters of SimpleString and digits, underscore
	 * @param string $domname The index of the element (identifier)
	 * @param mixed $value The value of the entry for being validated
	 * @param int $minLength The minimal length of the value
	 * @param int $maxLength The maximum length of the value
	 * @return ValidationClass
	 */
	function addNormalString(string $domname, string $value, int $minLength = 0, int $maxLength = 0): ValidationClass
    {
		$entry = new ValidationEntry($domname, $value);

		$entry->addRule(ValidationEntry::RuleRegEx, ValidationBase::NormalString);

		$entry->addRule(ValidationEntry::RuleRange, [$minLength, $maxLength]);

		return $this->addEntry($entry);
	}

	/**
	 * Adds text entry type of complicated for validation consist of
	 * characters of simple text and the other characters as well
	 * like digits, underscore, punctuation signs and etc.
	 * @param string $domname The index of the element (identifier)
	 * @param mixed $value The value of the entry for being validated
	 * @param int $minLength The minimal length of the value
	 * @param int $maxLength The maximum length of the value
	 * @return ValidationClass
	 */
	function addFullString(string $domname, string $value, int $minLength = 0, int $maxLength = 0): ValidationClass
    {
		$entry = new ValidationEntry($domname, $value);

		$entry->addRule(ValidationEntry::RuleRegEx, ValidationBase::FullString);

		$entry->addRule(ValidationEntry::RuleRange, [$minLength, $maxLength]);

		return $this->addEntry($entry);
	}

	/**
	 * Adds the type of the source of the data
	 * @param mixed $domname The name of the DOM Element
	 * @param mixed $result The result of the operation
	 * @return ValidationClass
	 */
	function addDataSource($domname, $result): ValidationClass
    {
		return $this->entries->item($domname)->add(ValidationEntry::DataSource, $result);
	}

	/**
	 * Adds date type of validation entry into the database
	 * @param mixed $domname The name of the DOM Element
	 * @param mixed $result The result of the operation
	 * @return ValidationClass
	 */
	function addDate($domname, string $format, string $date): ValidationClass
    {
		$entry = new ValidationEntry($domname, $date);

		$entry->addRule(ValidationEntry::RuleRegEx, $format);

		return $this->addEntry($domname, $entry);
	}

	/**
	 * Adds the value for the entry validation
	 * @param mixed $value The value of the entry
	 * @return ValidationClass
	 */
	function addValue($domname, $value): ValidationClass
    {
		return $this->entries->item($domname)->add(ValidationEntry::EntryValue, $value);
	}

	/**
	 * Validate the provided data
	 * @return bool Returns true if validation passed ok, false
	 * on opposite case
	 */
	function validate(): bool
    {
	// TODO: validation algorithm
	}

	// Name
	static function isName(string $name): bool
    {
		if (preg_match(ValidationBase::NAME, $name))
		{
			return true;
		}

		return false;
	}
	// E-Mail
	static function isEmail(string $email): bool
    {
		if (filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			return true;
		}
		elseif (preg_match(ValidationBase::EMAIL2, $email))
        {
			return true;
		}

		return false;
	}

	/**
	* Description of isNumeric ( string $int)
	* checks whether given string data is integer or no
	* @param string $int - string digits
	* @return bool true in case of success, false in opposite case
	*/
	static function isNumeric(string $int): bool
    {
		return (preg_match('/\D+/', $int) ? false : true);
	}

	// Confirmation
	static function isConfirmed(string $field1, string $field2): bool
    {
		if ($field1 === $field2)
		{
			return true;
		}

		return false;
	}

	// E-Nickname
	static function isNickname(string $nickname): bool
    {
		if (strlen($nickname) > 25 || strlen($nickname) < 4)
		{
			return false;
		}
		elseif (preg_match(ValidationBase::NICKNAME, $nickname))
        {
			return false;
		}
	}

	// Password
	static function isPassword(string $password, int $min_length = 8, int $max_length = 16): bool
    {
		if (strlen($password) > $max_length || strlen($password) < $min_length)
		{
			return false;
		}
		elseif (!preg_match(ValidationBase::PASSWORDCHARS, $password))
        {
			return false;
		}

		return true;
	}

	// Mobile
	static function isArmMobile(string $armMobileNumber): bool
    {
		if (preg_match('/[0-9]{6}/', $armMobileNumber))
		{
			return true;
		}

		return false;
	}

	/**
	* RegExp checkout of the given data as an argument
	* is it title or no
	* @param string $data Data that is going to be checked
	* @return bool <b>TRUE</b> if is, <b>FALSE</b> on the opposite case
	*/
	static function isTitle(string $data): bool
    {
		if (preg_match(ValidationBase::TITLE, $data))
		{
			return true;
		}

		return false;
	}

	/**
	* Description of <b>isAddress</b>
	* does regexp checkout of given data whether it is
	* address of location on the planet or no
	* (e.g. street, house, appartment)
	*
	* @param string $data The input data
	*
	* @return bool <b>TRUE</b> if os address, <b>FALSE</b> if not
	*
	*/
	static function isAddress(string $data): bool
    {
		if (preg_match(ValidationBase::ADDRESS, $data))
		{
			return true;
		}

		return false;
	}

	// Mobile phonenumber
	static function isPhoneNumber(string $phoneNumber, int $minLength = 6, int $maxLength = 30): bool
    {
		if (preg_match(sprintf('/[0-9]{%s,%s}/', $minLength, $maxLength), $phoneNumber))
		{
			return false;
		}

		return true;
	}

	// Amount of characters
	static function amountOfCharacters(string $subject, int $_from, int $_to): bool
    {
		return boolval(preg_match("/.{" . $_from . "," . $_to . "}/s", $subject));
	}

	// Regex pattern based data checkout
	static function isValid($data, $pattern): bool
    {
		return (boolval(preg_match($pattern, $data))) ? true : false;
	}

	/**
	* Checks out whether given value belongs to the given range of values
	* @param int $val Needle
	* @param int $from Start of the haystack
	* @param int $to End of the haystack
	* @return bool if in the haystack true, otherwise false
	*/
	static function inRange(int $val, int $from, int $to): bool
    {
		return in_array($val, [$from, $to]);
	}
}
?>