<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegistroRequest;
use App\Models\User;
use App\Http\Requests\AccesoRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class AutenticarController extends Controller
{
    public function registro(RegistroRequest $registroRequest){
        $user = new User();
        $user->name = $registroRequest->name;
        $user->email = $registroRequest->email;
        $user ->password = bcrypt($registroRequest->password);
        $user->save();

        $user->roles()->attach($registroRequest->roles);

        return response()->json([
            'res' => true,
            'msg'=>'Usuario registrado correctamente'
        ],200);
    }

    public function acceso(AccesoRequest $request){
        $user = User::with('roles')->where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'msg' => ['Las credenciales son incorrectas.'],
            ]);
        }

        $token = $user->createToken($request->email)->plainTextToken;

        return response()->json([
            'res' => true,
            'token' => $token,
            'usaurio'=>$user
        ],200);
    }

    public function cerrarSesion(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'res' => true,
            'msg' => 'Token eliminado correctamente'
        ],200);
    }

}
