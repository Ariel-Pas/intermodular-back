<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Models\Usuario;
use App\Models\Centro;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.usuarios', compact('usuarios'));
    }

    //CORREGIR O ELIMINAR
    public function controlPanel()
    {
        return view('inicio');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $centros = Centro::all();
        return view('usuarios.create', compact('centros'));
    }

    /**
     * Store a newly created resource in storage.
     */
    //HE QUITADO EL UsuarioRequest PORQUE ME DA FALLOS CON EL EMAIL, AGREGAR LUEGO
    public function store(Request $request)
    {

        $usuario = new Usuario();
        $usuario->nombre = $request->nombre;
        $usuario->apellidos = $request->apellidos;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->centro_id = $request->centro_id;
        $usuario->save();

        //ASIGNAR ROLES
        $roles = Role::whereIn('nombre', $request->roles)->get();
        $usuario->roles()->attach($roles);

        $msg = "Usuario creado con éxito!";
        return redirect()->route('usuarios.index')->with('msg', $msg);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.usuario', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $usuario = Usuario::findOrFail($id);
        $centros = Centro::all();
        return view('usuarios.edit', compact('usuario', 'centros'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->nombre = $request->nombre;
        $usuario->apellidos = $request->apellidos;
        $usuario->email = $request->email;
        //SI NO SE CAMBIA EL PASS, NO ES NECESARIO ENCRIPTARLA DENUEVO
        if ($request->password) {
            $usuario->password = bcrypt($request->password);
        }
        $usuario->centro_id = $request->centro_id;
        $usuario->update();

        //ASIGNAR ROLES
        $rolesIds = Role::whereIn('nombre', $request->roles)->pluck('id');
        $usuario->roles()->sync($rolesIds);

        $msg = "Usuario $request->nombre editado con éxito!";
        return redirect()->route('usuarios.index')->with('msg', $msg);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        $msg = "Usuario con ID: $id eliminado con éxito!";
        return redirect()->route('usuarios.index')->with('msg', $msg);
    }


    //REVISAR
    public function asignarRoles(Request $request, Usuario $user)
    {
        $request->validate([
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,id',
        ]);

        //ASIGNA MULTIPLES ROLES AL USUARIO
        $user->roles()->sync($request->roles);

        return response()->json(['mensaje' => 'Roles asignados correctamente']);
    }
}
