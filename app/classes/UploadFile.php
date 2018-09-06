<?php

namespace App\Classes;

class UploadFile {

   protected $filename;
   protected $max_filesize = 2097152;
   protected $extension;
   protected $path;

   /**
    * Get the file name
    * @return mixed
    */
   public function getName() {
      return $this->filename;
   }

   /**
    * Set the name of the file
    * @param $file
    * @param string $name
    */
   protected function setName($file, $name = "") {
      if ($name === "") {
         $name = pathinfo($file, PATHINFO_FILENAME);
      }
      $name = strtoLower(str_replace(['-', ' '], '-', $name));
      $hash = md5(microtime());
      $ext = $this->fileExtention();
      $this->filename = "{$name}-{$hash}.{$ext}";
   }

   /**
    * Set file extension
    * @param $file
    * @param mixed
    */
   protected function fileExtension($file) {
      return $this->extension = pathinfo($file, PATHINFO_EXTENSION);
   }

   /**
    * Validate file size
    * @param $file
    * @return bool
    */
   public static function fileSize($file) {
      $fileobj = new static;
      return $file > $fileobj->max_filesize ? true : false;
   }

   /**
    * Validate file upload
    * @param $file
    * @param bool
    */
   public static function inImage($file) {
      $fileobj = new static;
      $ext = $fileobj->fileExtension($file);
      $validExt = array('jpg', 'jpeg', 'png', 'gif');

      if (!in_array(strtoLower($ext), $validExt)) {
         return false;
      }
      return true;
   }

   /**
    * Get the path where file was uploaded
    * @return mixed
    */
   public function path() {
      return $this->path;
   }
}
