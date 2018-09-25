<?php
class UploadsClass {
 const ERROR_MIME_TYPE = 'mimetype';
 const ERROR_LARGE_FILE = 'largefile';

 private   $files = [];
 protected $savePath;
 private   $webPath;
 private   $validationErrors = [];
 protected $currentFile;
 private   $settings;

 /**
  * Description of UploadsClass __construct
  * @param array &$rawFiles PHP default array of uploaded files
  * @param string $savePath the path where files will be moved and saved
  * @param UploadsSettingsClass $settings settings for uploads
  * @return void
  **/
 public function __construct (array &$rawFiles, UploadsSettingsClass $settings, string $savePath = '') {
  $this->settings = $settings;
  $this->savePath = $savePath;
  $lastsign = $this->savePath [strlen ($this->savePath) - 1];

  if ($lastsign != '/' || $lastsign != '\\') {
   $this->savePath .= DIRECTORY_SEPARATOR;
  }

  unset ($lastsign);

  foreach ($rawFiles [UploadedFileClass::file_name] as $i => $name) {
   if (!in_array (ImageTypeClass::extToIMAGETYPE ($name), $this->settings->getSupportedFileTypes())) {
    continue;
   }

   if (count ($this->files) >= $this->settings->getFilesMaxAmount()) {
    break;}

   move_uploaded_file ($rawFiles [UploadedFileClass::file_tmpname][$i], $this->savePath . $name);
   $this->files[] = new UploadedFileClass (array (
    UploadedFileClass::file_name => $name,
    UploadedFileClass::file_type => $rawFiles [UploadedFileClass::file_type][$i],
    UploadedFileClass::file_size => $rawFiles [UploadedFileClass::file_size][$i],
    UploadedFileClass::file_error => $rawFiles [UploadedFileClass::file_error][$i],
   ));
  }

  unset ($filesTypes);
 }

 /**
  * Description of uniqueName
  * this method generates name by depending php built-in function
  * uniqid() and $prefix
  *
  * @param ?string $prefix any string text
  *
  * @return string
  **/
 static function uniqueName (string $prefix = ''): string {
  return (($prefix != '')? ($prefix . '_') : '') . uniqid();
 }

 function setCurrentFile (UploadedFileClass &$currentFile): UploadsClass {
  $this->currentFile = $currentFile;
  return $this;
 }

 function getUniqueFilename() {
  return $this->uniqueFilename;
 }

 function getValidationErrors(): array {
  return $this->validationErrors;
 }

 function setUniqueFilename ($uniqueFilename): UploadsClass {
  $this->unique_filename = $uniqueFilename;
  return $this;
 }

 function setValidationErrors ($validationErrors): UploadsClass {
  $this->validation_errors = $validationErrors;
  return $this;
 }

 function appendAnError ($index, $value): UploadedFileClass {
  $this->validationErrors [$index] = $value;
  return $this;
 }

 function getFiles(): array {
  return $this->files;
 }

 function getWebPath(): string {
  return $this->webPath;
 }

 function setWebPath (string $webPath): UploadsClass {
  $this->webPath = $webPath;
  return $this;
 }

 public function getSavePath(): string {
  return $this->savePath;
 }

 public function getSettings(): UploadsSettingsClass {
  return $this->settings;
 }

 public function setSettings (UploadsSettingsClass $settings): UploadsClass {
  $this->settings = $settings;
  return $this;
 }
}
?>
