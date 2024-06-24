<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\User\StoreRequest;
use App\Models\User;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
   public function __invoke(StoreRequest $request)
   {
    $data = $request->validated();
    $data = array_merge(['role_id' => '1'], $data);
    $data['password'] = Hash::make($data['password']);

    $userWithLogin = User::where('login', $data['login'])->first();
    if ($userWithLogin) {
       
        return response( ['error'=>'Пользователь с таким логином уже существует'],403);

    }
    
    $userWithEmail = User::where('email', $data['email'])->first();
    if ($userWithEmail) {
        return response( ['error'=>'Пользователь с таким email уже существует'],403);

    }
    
    $userWithPhoneNumber = User::where('phoneNumber', $data['phoneNumber'])->first();
    if ($userWithPhoneNumber) {
        return response( ['error'=>'Пользователь с таким номером телефона уже существует'],403);
    }
    $user=User::create($data);

    $token = auth()->tokenById($user->id);
    return response(['token'=>$token]);
   }

  
    
}
