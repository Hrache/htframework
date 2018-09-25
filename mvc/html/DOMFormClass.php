<?php
class DOMFormClass extends DOMElementClass {
 const method_post = "post";
 const method_get = "get";
 const enctype_usual = 'application/x-www-form-urlencoded';
 const enctype_file = 'multipart/form-data';

 private $_method;
 private $_enctype;
 private $_accept;
 private $_action;

 function __construct ( string $_action, string $_method = '', string $_enctype = '', string $_accept = '', string $elements = '') {
  $this->_action = $_action;

  if (empty($_method)) {
   $this->_method = self::method_post;
  }
  else {
   $this->_method = $_method;
  }

  if ( empty ( $_enctype)) {
   $this->_enctype = self::enctype_usual;
  } else {
   $this->_enctype = $_enctype;
  }

  if ( empty ( $_accept)) {
   $this->_accept = DOMMETAClass::text_html;
  } else {
   $this->_accept = $_accept;
  }

  $this->setAddAttributes([
   'action' => $this->_action,
   'accept' => $this->_accept,
   'enctype' => $this->_enctype,
   'method' => $this->_method,
  ]);
  $this->setData($elements);
 }

 /**
  * Description of getForm
  * returns the HTML code of the complete form
  *
  * @return string HTMl code of the complete form
  **/
 function getForm(): string {
  parent::__construct ( DOMElementClass::_form, $this->getData(), true);
  return $this->get_html_();
 }
}
?>