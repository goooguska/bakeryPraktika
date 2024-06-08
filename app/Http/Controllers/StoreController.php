<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
   public function __invoke(StoreRequest $request)
   {
    $data = $request->validated();
    $data = array_merge(['role' => 'customer'], $data);
    $data['password'] = Hash::make($data['password']);

    $user = User::where('login',$data['login'])->first();
    if ($user) return response( ['error'=>'Такой крутой логин или email существует, бро'],403);
    $user=User::create($data);

    $token = auth()->tokenById($user->id);
    return response(['token'=>$token]);
   }
  
    
}
