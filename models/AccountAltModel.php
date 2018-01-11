<?php
class AccountAltModel extends MySQLModelAbstract {
 const MODEL = 'acs_accountalt_tbl';

 const accountid = 'account_id';
 const nickname = 'nickname';
 const company = 'company';
 const arlternativeemail = 'arlternativeemail';
 const country = 'country';
 const state = 'state';
 const city = 'city';
 const zippostalcode = 'zippostalcode';
 const streetaddress = 'streetaddress';
 const houseappartment = 'houseappartment';
 const skype = 'skype';
 const msn = 'msn';
 const icq = 'icq';
 const aim = 'aim';
 const yim = 'yim';
 const facebook = 'facebook';
 const google = 'google';

 protected $account_id = null;
 protected $nickname = null;
 protected $company = null;
 protected $arlternativeemail = null;
 protected $country = null;
 protected $state = null;
 protected $city = null;
 protected $zippostalcode = null;
 protected $streetaddress = null;
 protected $houseappartment = null;
 protected $skype = null;
 protected $msn = null;
 protected $icq = null;
 protected $aim = null;
 protected $yim = null;
 protected $facebook = null;
 protected $google = null;

 function __construct ( Array $accountAltInfo = []) {
  parent::__construct ( self::MODEL, $accountAltInfo);
 }

 function getAccount_id() {
  $this->account_id;
 }

 function getNickname() {
  $this->nickname;
 }

 function getCompany() {
  $this->company;
 }

 function getArlternativeemail() {
  $this->arlternativeemail;
 }

 function getCountry() {
  $this->country;
 }

 function getState() {
  $this->state;
 }

 function getCity() {
  $this->city;
 }

 function getZippostalcode() {
  $this->zippostalcode;
 }

 function getStreetaddress() {
  $this->streetaddress;
 }

 function getHouseappartment() {
  $this->houseappartment;
 }

 function getSkype() {
  $this->skype;
 }

 function getMsn() {
  $this->msn;
 }

 function getIcq() {
  $this->icq;
 }

 function getAim() {
  $this->aim;
 }

 function getYim() {
  $this->yim;
 }

 function getFacebook() {
  $this->facebook;
 }

 function getGoogle() {
  $this->google;
 }
}
?>