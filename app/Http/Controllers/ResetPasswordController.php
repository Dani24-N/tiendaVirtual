<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Notifications\passwordReset;
use App\Password_Reset;
use App\Password_History;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function notificationReset(Request $request){

        $request->validate([
            'user' => 'required|string',
        ]);

        $user = request(['user']);
        $keys = array('nickname','email','number_document');
        for($i=0; $i <= count($keys); $i++) {
            $email= User::where($keys[$i],'=',$user)->first();
            if(!empty($email)){
                $resetPassword = new Password_Reset;
                $resetPassword->email = $email->email;
                $resetPassword->token = str_random(60);
                $resetPassword->save();
                $resetPassword->notify(new passwordReset($resetPassword));
                return response()->json(['message'=>'Se te envio un correo para realizar el cambio de contraseña'],200);
            }elseif($i == 2){
                return response()->json(['message'=>'No existe usuario con esta información!','content'=>'verifica si escribiste la información requerida?'],200);
            }
        }
    }

    public function verificationAction($token){


        $email = Password_Reset::where('token','=',$token)->first();

        if(empty($email)){
            return response()->json(['message' => 'No tienes que estar aqui ¡¡ Whoopss !!'],200);
        }

            $user = User::where('email','=',$email->email)->first();
            return response()->json($user, 200);
    }

    public function savePasswordHistory($id,$newPassword){
        $passwordHistory = new Password_History([
            'user_id' => $id,
            'password_last' => $newPassword,
        ]);

        $passwordHistory->save();
    }

    public function verificationPassHistory($id,$password){

        $lastPassword = Password_History::where('user_id','=',$id)->get();

        if(!empty($lastPassword)){

            foreach($lastPassword AS $passlast) {
                if(Hash::check($password,$passlast->password_last)){
                    return false;
                }
            }
            return true;
        }
    }

    public function changesPassword(Request $request){

        $request->validate([

            'id' => 'required|string',//Se dejara por el momento mientras hay FRONT
            'password' => 'required|string|confirmed',

        ]);
        $userId = $request->id;
        $newPassword = $request->password;

        if(!$this->verificationPassHistory($userId,$newPassword)){
            return response()->json(['message'=>'Ya utilizaste esta contraseña intenta con otra'], 200);
        }

        $passwordHash=Hash::make($newPassword);

        $changePass = User::find($userId);
        $changePass->password = $passwordHash;
        $changePass->save();

        $this->savePasswordHistory($userId,$passwordHash);

        return response()->json(['message'=>'Cambio Exitoso'], 200);

    }
}
