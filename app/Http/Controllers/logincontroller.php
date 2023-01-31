<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class logincontroller extends Controller
{
    public function login(Request $request)
    {

        $data = $request->validate(
            [
                'email' => 'required|email:rfc',
                'password' => 'required'

            ]

        );

        if (Auth::attempt($data)) {

            return Auth::user()->createToken("tokens")->plainTextToken;
        }

        return 'El correo o la contraseña son incorrectas';
    }

    public function whoami(Request $request)
    {

        return "estoy logueado";
    }

    public function logout(Request $request)
    {
        Auth::guard('sanctum')->user()->tokens()->delete();
        return 'Has cerrado sesión correctamente';
    }
}
