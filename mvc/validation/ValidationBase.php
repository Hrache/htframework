<?php
class ValidationBase {
	const _NAME = 'isName';
	const _EMAIL = 'isEmail';
	const _CONFIRMED = 'isConfirmed';
	const _NICKNAME = 'isNickname';
	const _PASSWORD = 'isPassword';
	const _ARMMOBILE = 'isArmMobile';
	const _TITLE = 'isTitle';
	const _ADDRESS = 'isAddress';
	const _INTPHONENUMBER = 'isIntPhoneNumber';
	const _NUMERIC = 'isNumeric';
	const INSET = 'inSet';
	const INRANGE = 'inRange';
	const MinLength = 'minLength';
	const ValidationOr = 'or';
	const SimpleString = "/[\w]+/";
	const NormalString = "/[\w]+/";
	const FullString = "/[\w]+/";
	const SimpleName = "/[a-zA-Z\-\'\ \p{Armenian}]{2,64}/";
	const Nickname = "/[a-zA-Z0-9\-\'\, ]{2,64}/";
	const Title = '/[\w\-\ \_]{4,80}/';
	const ArmenianChars = "[\p{Armenian}]+";
	const PunctuationSigns = "^[^\s@]+@[^\s@]+\.[^\s@]+$";
	const Year = "/[0-9]{4}/";
	const Day = "/[0-9]{2}/";
	const Month = "/[0-9]{1,2}/";
	const Website = "/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/";
	/**
	 * @var string RegEx for the email
	 */
	const Email = '/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/';
	/**
	 * @var string RegEx for email
	 */
	const Email1 = '/^[a-z0-9!\'#$%&*+\/=?^_`{|}~-]+(?:\.[a-z0-9!\'#$%&*+\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-zA-Z]{2,}$/i';
	/**
	 * @var string Regex for the email
	 */
	const Email2 = '/([\w-\.]+)@((?:[\w]+\.)+)([a-zA-Z]{2,4})/';
	/**
	 * @var string RegEx for the email
	 */
	const EmailStrict = '^[a-zA-Z0-9_\.]{2,50}@([a-zA-Z0-9\-\.?]+\.)*[a-zA-Z0-9\-]+\.(com|edu|gov|mil|net|org|biz|info|name|museum|us|ca|uk)$';
	/**
	 * @var string RegEx for the email
	 */
	const EmailLoose = '^[a-zA-Z0-9_\.]{2,50}@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.?]+$';
	/**
	 * @var string RegEx for the week password
	 */
	const PasswordWeek = '/[\w ]{4,8}/gu';
	/**
	 * @var string RegEx for the medium password
	 */
	const PasswordMedium = '/[\w ]{8,25}/gu';
	/**
	 * @var string RegEx for the strong password
	 */
	const PasswordStrong = '/[\w\W ]{8,25}/gu';
	/**
	 * @var string RegEx for the MD5Hash
	 */
	const MD5Hash = '/^([a-z0-9]{32})$/';
	/**
	 * @var string RegEx for Hexadecimal representation of the color
	 */
	const HTMLColor = '^#?[a-fA-F0-9]{3|6}$';
	/**
	 * @var string RegEx for the time
	 */
	const Time = "^[0-2]?[0-9]:[0-5][0-9]( ?(a\.?|p\.?)m\.?))?";
	/**
	 * @var string RegEx for the US Dollor
	 */
	const USDollor = '^([0-9]+(\.[0-9]{2})?)?$';
	/**
	 * @var string RegEx for the IP Address
	 */
	const IPAddress = '^(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])$';
	/**
	 * @var string RegEx for the URL
	 */
	const URL = '^(((ht|f)tp(s?))\://)?(www.|[a-zA-Z].)[a-zA-Z0-9\-\.]+\.(com|edu|gov|mil|net|org|biz|info|name|museum|us|ca|uk)(\:[0-9]+)*(/($|[a-zA-Z0-9\.\,\;\?\'\\\+&%\$#\=~_\-]+))*$';
	/**
	 * @var string RegEx for the signs only
	 */
	const Signs = '[\W]+';
	/**
	 * @var string RegEx for the digits only
	 */
	const Digits = "[\d]+";
	/**
	 * @var string RegEx for the word characters only
	 */
	const WordChars = "[\w]+";
	/**
	 * @var string RegEx for the standard car names
	 */
	const CarNameStandard = "[\d\w\-\_\ ]+";
	/**
	 * @var string RegEx for the armenian phone numbers
	 */
	const ArmenianPhoneNumber = "/(\+374)(\d){8}/";
	/**
	 * @var string RegEx for the addresses
	 */
	const Address = '/[\w\d\-\ \_\:\(\)\.]{8,80}/';
	const Gender = "";
	const Company = "";
	const Phone = "";
	const FAX = "";
	const Mobile = "";
	const State = "";
	const City = "";
	const SIPPostalCode = "";
	const HouseAppartment = "";
	const Skype = "";
	const MSN = "";
	const ICQ = "";
	const AIM = "";
	const YIM = "";
	const Facebook = "(?:http:\/\/)?(?:www.)?facebook.com\/(?:(?:\w)*#!\/)?(?:pages\/)?(?:[?\w\-]*\/)?(?:profile.php\?id=(\d.*))?([\w\-]*)?";
	const Google = "";
}
?>