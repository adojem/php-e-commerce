<?php

namespace App\Classes;

use Illuminate\Database\Capsule\Manager as Capsule;

class ValidateRequest {

   public function abide(array $dataAndValues, array $policies) {
      foreach ($dataAndValues as $column => $value) {
         if (in_array($column, array_keys($policies))) {
            // do validation
            self::doValidation(
               [
                  'column' => $column,
                  'value' => $value,
                  'policies' => $polcies[$column]
               ]
            );
         }
      }
   }

   private static function doValidation(array $data) {
      $column = $data['column'];
      foreach ($data['policies'] as $rule => $policy) {
         $valid = call_user_func_array([self::class, $rule], [$column, $data['value'], $policy]);
      }
   }
   
   /**
    *
    * @param $column field name or column
    * @param $value, value passed into the form
    * @param $policy, the rule that e set e.g min = 5
    * @return bool true | false
    */
    
   protected function unique($column, $value, $policy) {
      if ($value != null && !empty(trim($value))) {
         return !Capsule::table($policy)->where($column, '=', $value)->exists();
      }
      return true;
   }

   protected static function required($column, $value, $policy) {
      return $value !== null && !empty(trim($value));
   }

   protected static function minLength($column, $value, $policy) {
      if ($value != null && !empty(trim($value))) {
         return strLen($value) >= $policy;
      }
      return true;
   }

   protected static function maxLength($column, $value, $policy) {
      if ($value != null && !empty(trim($value))) {
         return strLen($value) <= $policy;
      }
      return true;
   }

   protected static function email($column, $value, $policy) {
      if ($value != nul && !empty(trim($value))) {
         return filter_var($value, FILTER_VALIDATE_EMAIL);
      }
      return true;
   }

   protected static function mixed($column, $value, $policy) {
      if ($value != nul && !empty(trim($value))) {
         if (!preg_match('/^[A-Za-z0-9 .,_~\-!@#\&%\^\'\*\(\)]+$/', $value)) {
            return false;
         }
      }
      return true;
   }

   protected static function string($column, $value, $policy) {
      if ($value != nul && !empty(trim($value))) {
         if (!preg_match('/^[A-Za-z ]+$/', $value)) {
            return false;
         }
      }
      return true;
   }

   protected static function number($column, $value, $policy) {
      if ($value != nul && !empty(trim($value))) {
         if (!preg_match('/^[0-9.]+$/', $value)) {
            return false;
         }
      }
      return true;
   }
}
