<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Break_;
use PhpParser\Node\Stmt\Return_;
use App\Notifications\SignupActivate;

class AuthController extends Controller
{
    public function signup(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' =>'required|string|confirmed',
        ]);

        $user = new User([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'role_id' => 1,
            'state_id' => 2,
            'password' => bcrypt($request->password),
            'activation_token' => str_random(60),
        ]);

        $user->save();

        $user->notify(new SignupActivate($user));

        return response()->json([
            'message' => 'Excelente se ha creado el usuario!',
            'content'=> 'Se te envio un correo para que actives tu cuenta',
            ],201);
    }

    public function login(Request $request){

        $request->validate([
            'user' => 'required|string',
            'password' => 'required|string',
            'remember_me' => 'boolean',
        ]);

        $credentials = request(['user','password']);
        $credentials['state_id'] = 1;
        $credentials['deleted_at']= null;
        $keys= array('nickname','email','number_document');
        for($i=0;$i <=count($keys); $i++){
            if(Auth::attempt([$keys[$i] => $credentials['user'] , 'password' => $credentials['password']])){
                $stateUser= Auth::user()->state_id;
                if($stateUser == 2){
                    return response()->json(['message'=>'Inactivo']);
                }elseif($stateUser == 3){
                    return response()->json(['message'=>'Bloqueado Grocero']);
                }
            break;
            }
            else if($i == 2){
             return response()->json(['message'=>'Unauthorized'],401);
            }
        }

        $user =  $request->user();
        $tokenResult = $user->createToken('Personal Acces Token');
        $token = $tokenResult->token;

        if($request->remenber_me){
            $token->expires_at = Carbon::now()->addWeeks(1);
        }

        $token->save();

        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at)->toDateTimeString(),
        ]);

    }

    public function logout(Request $request){
        $request->user()->token()->revoke();

        return response()->json(['message'=>'Successfully logged out']);
    }

    public function user (Request $request)
    {
        return response()->json($request->user());
    }

    public function signupActivate($token){
        $user = User::where('activation_token','=',$token)->first();
        $user->state_id = 1;
        $user->activation_token = '';
        $user->save();

        return $user;
    }
}
