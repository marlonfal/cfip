<?php

namespace App\Http\Controllers;
use Validator;
use Hash;
use Auth;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Función que devuelve la vista para cambiar contraseña
     */
    public function password(){
        return view('auth.changepassword');   
    }

    /**
     * Función que cambia la contraseña
     */
    public function updatePassword(Request $request){
        $rules = [
            'mypassword' => 'required',
            'password' => 'required|confirmed|min:6|max:18',
        ];
        
        $messages = [
            'mypassword.required' => 'El campo es requerido',
            'password.required' => 'El campo es requerido',
            'password.confirmed' => 'Las contraseñas no coinciden',
            'password.min' => 'El mínimo permitido son 6 caracteres',
            'password.max' => 'El máximo permitido son 18 caracteres',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect('changepassword')->withErrors($validator);
        }
        else{
            if (Hash::check($request->mypassword, Auth::user()->password)){
                $user = new User;
                $user->where('email', '=', Auth::user()->email)
                     ->update(['password' => bcrypt($request->password)]);
                return redirect('changepassword')->with('info', 'Contraseña cambiado con éxito');
            }
            else
            {
                return redirect('changepassword')->with('info', 'Credenciales incorrectas');
            }
        }
    }
}
