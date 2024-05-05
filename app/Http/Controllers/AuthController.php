<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function singup(Request $request){
        // $data= $request->validated();
        /** @var \App\Models\User $user  */
        $user=User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password'=>Hash::make($request->password)
        ]);

        $token=$user->createToken('token')->plainTextToken;
        return response()->json(
            [
                'user'=>$user,
                'token'=>$token
            ],
            201
        );
    }
    public function login(Request $request){
        // $data = $request->validated();
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return response()->json([
                'result'=>'failed',
            ]);
        }
        /** @var User $user */
        $user = Auth::user();
        $token=$user->createToken('token')->plainTextToken;
        return response()->json(
            [
                'user'=>$user->id,
                'token'=>$token
            ],
        );
    }

    public function logout(Request $request){
        /** @var User $user */
        // dd($request->token);
        try{
            $user= $request->user();
            // Log::debug($user);
            $user->currentAccessToken()->delete();
            return response()->json([
                'result'=>'success',
            ]);
        }catch(Exception $ex){
            Log::error('exception',$ex);
            return response()->json([
                'result'=>'failed',
            ]);
        }

    }
}
