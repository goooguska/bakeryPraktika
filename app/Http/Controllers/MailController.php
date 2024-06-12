<?php

namespace App\Http\Controllers;

use App\Mail\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{

   public function send()
   {
      $title = 'adadadada';
      $body = 'Thank you for participating!';
   
      Mail::to('cahalego@mail.ru')->send(new Feedback($title, $body));
   
      return "Email sent successfully!";
   }
  
}
