<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;


class UsuarioApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //LE MOSTRARÉ UNICAMENTE LOS USUARIOS QUE TENGAN LOS ROLES CENTRO O TUTOR, SI TIENE SOLO ADMIN NO
        //PERO SI TIENE ALGUNO DE LOS ROLES Y ADEMAS ADMIN TAMBIEN SE MOSTRARÁ
        $usuarios = Usuario::whereHas('roles', function ($query) {
            $query->whereIn('role_id', [2, 3]);
        })->get();

        return response()->json($usuarios, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validado = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|unique:users,email',
            'password' => 'required|string|min:6'
        ]);

        $usuario = Usuario::create([
            'nombre' => $validado['nombre'],
            'apellidos' => $validado['apellidos'],
            'email' => $validado['email'],
            'password' => Hash::make($validado['password']),
            'centro_id' => Auth::user()->centro_id
        ]);

        //ASIGNAR EL ROL TUTOR AUTOMATICAMENTE
        $tutorRole = Role::where('nombre', 'Tutor')->first();
        $usuario->roles()->attach($tutorRole);

        return response()->json($usuario, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        return response()->json($usuario, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        $validado = $request->validate([
            'nombre' => 'sometimes|string|max:255',
            'apellidos' => 'sometimes|string|max:255',
            'email' => ['sometimes', Rule::unique('users')->ignore($usuario->id)],
            'password' => 'sometimes|string|min:6'
        ]);

        if($request->has('password')){
            $validado['password'] = Hash::make($validado['password']);
        }

        //FORZAR EL CENTRO_ID DEL USUARIO AUTH
        $validado['centro_id'] = Auth::user()->centro_id;
        $usuario->update($validado);

        return response()->json($usuario, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return response()->json(null, 204);
    }
}
