<?php

namespace App\Services;

use App\Http\Requests\LoginRequest;
use App\Models\Rule;
use App\Models\User;
use App\Repositories\Eloquent\UserRepository;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

/**
 * Class UserService.
 */
class UserService
{
    protected  $userRepository;
    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }
    protected function createNewToken($token, $redirectUrl){
        return [
            'success'=>true,
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user(),
            'redirect' => $redirectUrl
        ];
    }
    protected function saveRule($id,$dec) {
        $rule = new Rule();
        $rule->user_id = $id;
        $rule->description = $dec;
        $rule->save();
    }
    public function register( $request)
    {
        try {
            $user = new User();
            $user->password = bcrypt($request->password);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
            $dec = 'Học Viên';
            $this->saveRule($user->id,$dec);
            $token =JWTAuth::attempt(['email'=>$request->email, 'password'=>$request->password]);
            $user = Auth::user();

            // Kiểm tra vai trò của người dùng
            $redirectUrl = $user->rule->rules === 1 ? '/admin/dashboard' : '/dashboard';
            return $this->createNewToken($token, $redirectUrl);
            
        } catch (\Throwable $th) {
            return  [
                'er'=>$th,
                'status' => 'error',
                'message' => 'Xảy ra lỗi.',
             ];
        }
    }

    public function login($request)
    {
        try {
           
    
            if (! $token = JWTAuth::attempt($request->all())) {
                return ['success'=>false,'error' => 'Tài khoản hoặc mật khẩu không chính xác!'];
            }
            $user = Auth::user();

            // Kiểm tra vai trò của người dùng
            $redirectUrl = $user->rule->rules === 1 ? '/admin/dashboard' : '/dashboard';
            return $this->createNewToken($token,  $redirectUrl);


        } catch (\Throwable $th) {
            return  [
                'status' => 'error',
                'message' => 'Xảy ra lỗi.'
             ];
        }
    }

    public function logout()
    {
        //
    }

}
