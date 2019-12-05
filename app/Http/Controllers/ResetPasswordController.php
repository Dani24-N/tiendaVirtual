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
        $request->validation([
            'user' => 'required|string',
        ]);

        $user = request(['user']);
        $keys = array('nickname','email','number_document');
        for($i=0; $i <= count($keys); $i++) {
            $email= User::where($keys[$i],'=',$user)->firts();
            if(!empty($email)){
                $resetPassword = new Password_Reset([
                    'email' => $email->email,
                    'token' => str_random(60),
                ]);

                $resetPassword->save();
                $email->notify(new passwordReset($resetPassword));

                return response()->json(['message'=>''],200);
            }elseif($i == 2){
                return response()->json(['message'=>'No existe usuario con esta información!','content'=>'verifica si escribiste la información requerida?'],200);
            }
        }
    }

    public function verificationAction($token){

        $email = Password_Reset::where('token','=',$token)->first();
        $user = User::where('email','=',$email)->first();
        if(empty($email)){
            return response()->json(['message' => 'No tienes que estar aqui ¡¡ Whoopss !!'],200);
        }
        return response()->json([$user->id,$user->email,$user->name,$user->lastname],100);
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
        foreach($lastPassword->password_last as $passwordLast){
            if(Hash::check($password, $passwordLast)){
                return false;
            }
        }
        return true;
    }

    public function changesPassword(Request $request){

        $request->validation([
            'password' => 'required|string|confirmed',
        ]);
        $idUser = $request->id;
        $newPassword = $request->password;
        $resulPass = self::verificationPassHistory($idUser,$newPassword);
        if($resulPass){
            $password=Hash::make($newPassword);
            User::where('email','=',request(['email']))->update([
                'password'=>$password,
            ]);
            $result = self::savePasswordHistory($idUser,$password);
            return response()->json(['message'=>'Cambio Existoso'],200);
        }else{
            return response()->json(['message'=>'Ya utilizaste esta contraseña, prueba con otra'],100);
        }

    }


}
