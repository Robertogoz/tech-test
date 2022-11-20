<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\Hash;
use App\Http\Services\UserService;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $service) {
        $this->userService = $service;
    }

    public function getAll() {
        $users = User::with('address')->get();
        
        return response($users);
    }

    public function register(Request $request) {
        $response = $this->userService->registerUser($request);

        return response($response);
    }

    public function login(Request $request) {
        $response = $this->userService->auth($request);

        return($response);
    }

    public function logout(Request $request) {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }
}
