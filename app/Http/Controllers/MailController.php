<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMailRequest;
use App\Mail\Feedback;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{

   public function __invoke(StoreMailRequest $request)
   {
      $data = $request->validated();
      Mail::to($data['email'])->send(new Feedback());
   
   }
  
}
