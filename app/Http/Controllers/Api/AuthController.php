<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller{
   public function login(LoginRequest $request){

    $user = User::where('email', $request->email)->first();
    if (! $user || $user->password == $request->password) {
        return response()->json([
            'error' => 'the provided credenials are invalid',
        ], 422);
    }
    $device = substr($request->userAgent() ?? '', 0, 255);
    $user->remember_token = $user->createToken($device)->plainTextToken;
    $user->save();

    return response()->json([
        'access_token' => $user->createToken($device)->plainTextToken,
    ], 200);


   }
   public function index(Product $product){
    return response()->json(['latest 3 products' => $product->orderBy('id','desc')->latest()->take(5)->get()], 200);

   }

}
