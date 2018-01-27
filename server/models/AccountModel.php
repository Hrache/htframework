<?php

class AccountModel extends MySQLModelAbstract {

 const MODEL = 'acs_account_tbl';
 const id = 'id';
 const email = 'email';
 const password = 'password';
 const name = 'name';
 const surname = 'surname';
 const birthday = 'birthday';
 const gender = 'gender';
 const phonecodeid = 'phonecodeid';
 const phonenumber = 'phonenumber';
 const signupdate = 'signupdate';
 const lastvisit = 'lastvisit';
 const rules = [
     self::id => [
         'type' => 'mediumint',
         'null' => 'NO',
         'length' => '7',
         'type_extra' => 'unsigned',
         'default' => '',],
     self::email => [
         'type' => 'varchar',
         'null' => 'NO',
         'length' => '128',
         'type_extra' => '',
         'default' => '',],
     self::password => [
         'type' => 'varchar',
         'null' => 'NO',
         'length' => '32',
         'type_extra' => '',
         'default' => '',],
     self::name => [
         'type' => 'varchar',
         'null' => 'NO',
         'length' => '45',
         'type_extra' => '',
         'default' => '',],
     self::surname => [
         'type' => 'varchar',
         'null' => 'NO',
         'length' => '70',
         'type_extra' => '',
         'default' => '',],
     self::birthday => [
         'type' => 'date',
         'null' => 'NO',
         'type_extra' => '',
         'default' => '',],
     self::gender => [
         'type' => 'enum',
         'null' => 'NO',
         'enum' => array('m', 'w'),
         'type_extra' => '',
         'default' => 'm',],
     self::phonecodeid => [
         'type' => 'tinyint',
         'null' => 'NO',
         'length' => '4',
         'type_extra' => '',
         'default' => '',],
     self::phonenumber => [
         'type' => 'varchar',
         'null' => 'NO',
         'length' => '30',
         'type_extra' => '',
         'default' => '',],
     self::signupdate => [
         'type' => 'datetime',
         'null' => 'NO',
         'type_extra' => '',
         'default' => 'CURRENT_TIMESTAMP',],
     self::lastvisit => [
         'type' => 'datetime',
         'null' => 'NO',
         'type_extra' => '',
         'default' => 'CURRENT_TIMESTAMP',],];

 // mediumint(7) unsigned
 protected $id;
 // varchar(128)
 protected $email;
 // varchar(16)
 protected $password;
 // varchar(45)
 protected $name;
 // varchar(70)
 protected $surname;
 // date
 protected $birthday;
 // enum('m','w')
 protected $gender;
 // tinyint(4)
 protected $phonecodeid;
 // varchar(30)
 protected $phonenumber;
 // datetime
 protected $signupdate;
 // datetime
 protected $lastvisit;

 function __construct(array $accountInfo = []) {
  parent::__construct(self::MODEL, $accountInfo);
 }

 static function getAccountByLoginPassword(string $login, string $password): string {
  return "SELECT * FROM " . self::_fier(self::MODEL) . " WHERE `email`='" . $login . "' AND `password`='" . $password . "';";
 }

 static function getAccountByAccountId(string $id): string {
  return "SELECT * FROM " . self::_fier(self::MODEL) . " WHERE `id`='" . $id . "';";
 }

 static function insertNewAccount(Array $newdata) {
  $query = "INSERT INTO `" . self::MODEL . "` VALUES ('','" .
          $newdata->email . "','" .
          $newdata->password . "','" .
          $newdata->name . "','" .
          $newdata->surname . "','" .
          $newdata->birthday . "','" .
          $newdata->gender . "','" .
          $newdata->phonecodeid . "','" .
          $newdata->phonenumber . "','" .
          $newdata->signupdate . "','" .
          $newdata->lastvisit . "');";
 }

 public static function updateLastVisit(int $id): string {
  return sprintf("UPDATE `%s` SET `lastvisit`='%s' WHERE `id`='%s';", self::MODEL, date('Y-m-d H:i:s'), $id);
 }

 function getId(): string {
  return $this->id;
 }

 function getName(): string {
  return ucfirst($this->name);
 }

 function getSurname(): string {
  return ucfirst($this->surname);
 }

 function getEmail(): string {
  return $this->email;
 }

 function getPassword(): string {
  return $this->password;
 }

 function getBirthday(): string {
  return $this->birthday;
 }

 function getGender(): string {
  return $this->gender;
 }

 function getPhonecodeId(): string {
  return $this->intPhonecode;
 }

 function getPhoneNumber(): string {
  return $this->intPhoneNumber;
 }

 function getSignupDate(): string {
  return $this->signupDate;
 }

 function getLastVisit() {
  return $this->lastVisit;
 }

}

?>