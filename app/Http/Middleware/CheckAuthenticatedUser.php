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
        $token = $request->header('Authorization');

        if (!$token) {
            return response()->json(['message' => 'Token not provided'], 401);
        }

        // Xử lý token
        $token = str_replace('Bearer ', '', $token); // Loại bỏ "Bearer " nếu có

        try {
            // Xác thực và lấy thông tin người dùng
            $user = JWTAuth::setToken($token)->authenticate();

            if (!$user) {
                return response()->json(['message' => 'Token is invalid'], 401);
            }

            // Đặt người dùng vào Auth
            Auth::setUser($user);

            // Kiểm tra quyền của người dùng (ví dụ: kiểm tra rule)
            if ($user->rule->rules != 1) {
                return response()->json(['message' => 'Unauthorized'], 403);
            }
        } catch (Exception $e) {
            return response()->json(['message' => 'Token processing error'], 401);
        }

        return $next($request);
    }
}
