<?php

namespace App\Controllers;
use App\Classes\Mail;

class IndexController extends BaseController {

   public function show() {
      echo "Inside Homepage from controller class";
      $mail = new Mail();
      $data = [
         'to' => '',
         'subject' => 'Welcome to Acme Store',
         'view' => 'welcome',
         'name' => 'John Doe',
         'body' => 'Testing emial template'
      ];
      if ($mail->send($data)) {
         echo "Email sent succesfully";
      }
      else {
         echo "Email sending fail";
      }
   }
}