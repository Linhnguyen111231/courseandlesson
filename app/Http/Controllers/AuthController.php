<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequests;
use App\Http\Requests\RegisterRequests;
use App\Services\UserService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }
    public function pageLogin() {
        return view('auth.login');
    }
    public function pageRegister() {
        return view('auth.register');
    }
    public function login(LoginRequests $request) {
        $userStatus = $this->userService->login($request);
       
        return response($userStatus);
    }
    public function register(RegisterRequests $request) {
        $userStatus = $this->userService->register($request);
        return response($userStatus);
    }
}
