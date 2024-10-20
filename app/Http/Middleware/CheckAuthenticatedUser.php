<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class CheckAuthenticatedUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // Lấy token từ header
        $token = null;
        if ($request->header('Authorization')) {
            $token =  $request->header('Authorization');
        }else{
            
            $cookieWeb = $request->headers->get('cookie');
            $decay = explode('; ', $cookieWeb);
            foreach($decay as $item){
                if(strpos($item,'token=') === 0){

                    $token = substr($item,strlen('token='));
                }

            }
        }
        if (!$token) {
            return response()->json(['message' => 'Token not provided'], 401);
        }

        $token = str_replace('Bearer ', '', $token); 

        try {
            $user = JWTAuth::setToken($token)->authenticate();

            if (!$user) {
                return response()->json(['message' => 'Token is invalid'], 401);
            }

            Auth::setUser($user);

            if ($user->rule->rules != 1) {
                return $next($request);

            }
        } catch (Exception $e) {
            return response()->json(['message' => 'Token processing error'], 401);
        }

        return $next($request);
    }
}
