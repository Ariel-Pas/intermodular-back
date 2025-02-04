<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Usuario::orderBy('role');
        return view('usuarios.usuarios', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    //AGREGAR VALIDACION UsuarioPost
    public function store(Request $request)
    {
        $usuario = new Usuario();
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        //REVISAR UNIQUE
        $usuario->email = $request->email;
        $usuario->password = $request->password;
        //REVISAR UNIQUE REL EMPRESA
        $usuario->cif = $request->cif;
        //REVISAR UNIQUE REL CENTRO
        $usuario->centro_id = $request->centro_id;
        $usuario->role = $request->role;
        $usuario->save();

        return redirect()->route('usuarios.index')->with('msg', "Usuario $request->nombre, y rol $request->role creado con éxito!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $usuario = Usuario::firstWhere('id', '=', $id);
        $usuario = Usuario::findOrFail($id);
        //dd($usuario);
        return view('usuarios.usuario', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        //CHEQUEAR EDICION
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        //REVISAR UNIQUE
        $usuario->email = $request->email;
        $usuario->password = $request->password;
        //REVISAR UNIQUE REL EMPRESA
        $usuario->cif = $request->cif;
        //REVISAR UNIQUE REL CENTRO
        $usuario->centro_id = $request->centro_id;
        $usuario->role = $request->role;
        $usuario->save();

        return redirect()->route('usuarios.index')->with('msg', "Usuario $request->nombre, y rol $request->role editado con éxito!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('msg', "Usuario con ID: $id eliminado con éxito!");
    }
}
