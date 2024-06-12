<?php

namespace App\Http\Controllers;

use App\Mail\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{

   public function __invoke()
   {
      // return $data;
      // Mail::to($email)->send(new Feedback());
   
   }
  
}
