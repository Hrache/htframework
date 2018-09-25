<?php
/**
 * Description of ImageUploadsSettingsClass
 * Stores settings for UploadsClass
 * @author Max Pyger
 */
final class UploadsSettingsClass {
 const FILESMAXAMOUNT = 'filesmaxamount';
 const MAXFILESIZE = 'maxfilesize';
 const SUPPORTEDFILETYPES = 'supportedfiletypes';

 private $filesMaxAmount = null;
 private $maxFileSize = null;
 private $supportedFileTypes = null;

 function __construct ( $filesMaxAmount = null, $maxFileSize = null, $supportedFileTypes = null) {
  $this->filesMaxAmount = $filesMaxAmount;
  $this->maxFileSize = $maxFileSize;
  $this->supportedFileTypes = $supportedFileTypes;
 }

 public function getFilesMaxAmount() {
  return $this->filesMaxAmount;
 }

 public function getMaxFileSize() {
  return $this->maxFileSize;
 }

 public function getSupportedFileTypes() {
  return $this->supportedFileTypes;
 }

 public function setFilesMaxAmount ( $filesMaxAmount) {
  $this->filesMaxAmount = $filesMaxAmount;
 }

 public function setMaxFileSize ( $maxFileSize) {
  $this->maxFileSize = $maxFileSize;
 }

 public function setSupportedFileTypes ( string ...$args) {
  $this->supportedFileTypes = func_get_args();
 }
}
