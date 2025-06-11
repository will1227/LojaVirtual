<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ProductsControllerApi extends Controller
{


    public function createUserApi(Request $request){
        $request ->validate([
            'name' => 'required|string|max:',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);
    }
    public function loginapi(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::where('email', $request->email)->first();
        if (! $user || ! Hash::check(
            $request->password,
            $user->password
        )) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are
incorrect.'],
            ]);
        }
        return $user->createToken('token')->plainTextToken;
    }

    public function index()
    {
        $productList = Product::all();
        return response()->json([
            "success" => true,
            "message" => "Lista de produtos",
            "data" => $productList
        ]);
    }
}
