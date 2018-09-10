<?php

namespace App\Classes;

class Session {
   /**
    * create a session
    * 
    * @param $name
    * @param $value
    * @return mixed
    * @throw \Exception
    */
   public static function add($name, $value) {
      if ($name != '' && !empty($name) && $value != '' && !empty($value)) {
         return $_SESSION[$name] = $value;
      }

      throw new \Exception('Name and value required');
   }

   /**
    * get value from session
    *
    * @param $name
    * @return mixed
    */
   public static function get($name) {
      return $_SESSION[$name];
   }

   /**
    * check is session exist
    *
    * @param $name
    * @return bool
    * @throw \Exception
    */
   public static function has($name) {
      if ($name != empty($name)) {
         return (isset($_SESSION[$name])) ? true : false;
      }

      throw new \Exception('Name is required');
   }
   
   /**
    * remove session
    *
    * @param $name
    */
   public static function remove($name) {
      if (self::has($name)) {
         unset($_SESSION[$name]);
      }
   }
}