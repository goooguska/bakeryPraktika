<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class VerifyRecaptcha
{
    public function handle(Request $request, Closure $next)
    {
        $recaptchaResponse = $request->input('g-recaptcha-response');

        if (!$recaptchaResponse) {
            return response()->json(['message' => 'reCAPTCHA verification failed'], 422);
        }

        $client = new Client();
        $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => [
                'secret' => config('recaptcha.secret_key'),
                'response' => $recaptchaResponse,
                'remoteip' => $request->ip(),
            ],
        ]);

        $body = json_decode((string)$response->getBody());

        if (!$body->success) {
            return response()->json(['message' => 'reCAPTCHA verification failed'], 422);
        }

        return $next($request);
    }
}
