<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
{


        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
            'recaptcha' => 'required|string', 
        ]);
 

      $recaptchaToken = $request->input('recaptcha');
      $recaptchaSecret= env('VITE_GOOGLE_RECAPTCHA_SECRET');

        $recaptchaResponse = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$recaptchaSecret}&response={$recaptchaToken}");
        if ($recaptchaResponse === false) {
            return response()->json(['error' => 'Ошибка при выполнении запроса к Google reCAPTCHA'], 500);
        }
        $recaptchaResult = json_decode($recaptchaResponse);
        if (!$recaptchaResult->success ) {
            return response()->json(['error' => 'Ошибка проверки reCAPTCHA'], 401);
        }


        $credentials = $request->only('login', 'password');

        $user = User::where('login', $credentials['login'])->first();

        if (!$user) {
            return response()->json(['error' => 'Неправильный логин'], 401);
        }

        if (!Auth::attempt(['login' => $credentials['login'], 'password' => $credentials['password']])) {
            return response()->json(['error' => 'Неправильный пароль'], 401);
        }

        $token = Auth::attempt($credentials);
    
        return $this->respondWithToken($token);
    
    
}
     

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
       

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
