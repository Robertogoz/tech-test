<?php

namespace App\Http\Services;

use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Notifications\EmailNotification;

class UserService {
    public function registerUser(Request $request) {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
            'street' => 'required|string',
            'number' => 'required|integer',
            'district' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zipCode' => 'required|string'
        ]);

        $user = User::create([
            'name'=> $fields['name'], 
            'email'=> $fields['email'], 
            'password' => bcrypt($fields['password'])
        ]);

        // $user->notify(new EmailNotification()); 

        $address = Address::create([
            'street'=> $fields['street'],
            'number'=> $fields['number'],
            'district' => $fields['district'], 
            'city' => $fields['city'], 
            'state'=> $fields['state'], 
            'zipCode'=> $fields['zipCode'], 
            'user_id'=> $user['id']
        ]);
        
        $response = [
            'user' => $user,
            'address' => $address
        ];

        return $response;
    }

    public function auth(Request $request) {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $fields['email'])->first();

        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Invalid email or password'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return $response;
    }
}