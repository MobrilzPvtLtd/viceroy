<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function register(Request $request)
    {
        try
        {
          $validator = Validator::make($request->all(),
          [
              'name'=>'required',
              'email'=>'required|email|unique:users,email',
              'password'=>'required',
          ]);

          $user = User::create([
              'name'=>$request->name,
              'email'=>$request->email,
              'password'=>$request->password,
          ]);

          return response()->json([
              'status'=>true,
              'message'=>'user created successfuly',
              'token'=> $user->createToken("API TOKEN")->plainTextToken
          ],200);

       }catch(\Throwable $th){
          return response()->json([
              'status'=>false,
              'message'=>$th->getMessage(),

          ],500);
        }
    }

    public function login(Request $request)
    {
        try
        {
            $validator = Validator::make($request->all(),
            [
                'email'=>'required|email',
                'password'=>'required',

            ]);

            if (!Auth::attempt($request->only(['email','password']))){
                return response()->json([
                    'status' => false,
                    'message'=>'Email & password dos not match with your record'

                ],401);
            }
            $user = User::where('email',$request->email)->first();
            return response()->json([
                'status'=>true,
                'message'=>'login successfuly',
                'token'=> $user->createToken("API TOKEN")->plainTextToken
            ],200);

        }catch(\Throwable $th){
        return response()->json([
            'status'=>false,
            'message'=>$th->getMessage(),

        ],500);
      }

    }
}
