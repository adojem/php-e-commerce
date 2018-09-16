<?php

namespace App\Classes;

use Illuminate\Database\Capsule\Manager as Capsule;

class ValidateRequest {

   public function unique($column, $value, $policy) {
      if ($value != null && !empty(trim($value))) {
         return !Capsule::table($policy)->where($column, '=', $value)->exists();
      }
      return true;
   }

   public static function required($column, $value, $policy) {
      return $value !== null && !empty(trim($value));
   }

   public static function minLength($column, $value, $policy) {
      if ($value != null && !empty(trim($value))) {
         return strLen($value) >= $policy;
      }
      return true;
   }

   public static function maxLength($column, $value, $policy) {
      if ($value != null && !empty(trim($value))) {
         return strLen($value) <= $policy;
      }
      return true;
   }

}
