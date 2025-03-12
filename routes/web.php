<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/setup', function () {
    $credential = [
        'email' => 'admin@admin.com',
        'password' => '123456'
    ];

    if (!Auth::attempt($credential)) {
        $user = new \App\Models\User();

        $user->name = 'Admin';
        $user->email = $credential['email'];
        $user->password = Hash::make($credential['password']);

        $user->save();

        if (Auth::attempt($credential)) {
            $user = Auth::user();

            $adminToken = $user->createToken('admin-token', ['create', 'update', 'delete']);
            $userToken = $user->createToken('user-token', ['create', 'update']);
            $basicToken = $user->createToken('basic-token', ['read']);

            return response()->json([
                'adminToken' => $adminToken->plainTextToken,
                'userToken' => $userToken->plainTextToken,
                'basicToken' => $basicToken->plainTextToken,
            ], 201);
        }
    }
});
