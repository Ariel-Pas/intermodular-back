<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpresaRequest;
use App\Models\Empresa;

use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $empresas = Empresa::orderBy('nombre')->paginate(5);
        return view('empresas.empresas', compact('empresas'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('empresas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmpresaRequest $request)
    {
        //dd($request);
        $empresa = new Empresa();
        $empresa->nombre = $request->nombre;
        $datos = $request->only(['nombre', 'cif', 'descripcion', 'email', 'direccion', 'provincia', 'poblacion']);
        $datos['finSemana'] = $request->has('finSemana');
        //rellenar para tener un valor, más adelante se recibirá del form
        $datos['coordX'] = 0;
        $datos['coordY'] = 0;
        //Preguntar si una empresa tiene password o no
        $datos['password'] = '12345';
        //horario
        $datos['horario_manana'] = $request['apManana'].$request['cierreManana'];
        $datos['horario_tarde'] = $request['apTarde'].$request['cierreTarde'];

        Empresa::create($datos);

        return redirect()->route('empresas.index')->with('msg', "Empresa $request->nombre creada con éxito");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $empresa = Empresa::firstWhere('id', '=', $id);

        // dd($empresa);
        return view('empresas.empresa', compact('empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return redirect()->route('inicio');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Empresa::findOrFail($id)->delete();

        return redirect()->route('empresas.index');
    }

    public function nuevoPrueba()
    {
        $empresa = new Empresa();
        $empresa->nombre = 'Empresa' . rand(1, 40);
        $empresa->cif = 'cifInventado' . rand(1, 40);
        $empresa->descripcion = 'Esta empresa no existe';
        $empresa->email = 'empresa' . rand(1, 40) . '@mail.com';
        $empresa->password = '1234567';
        $empresa->direccion = 'Avenida 1 numero 2';
        $empresa->coordX = 0;
        $empresa->coordY = 0;
        $empresa->provincia = 1;
        $empresa->poblacion = 1;

        $empresa->save();

        return redirect()->route('empresas.index');
    }

    public function editarPrueba($id)
    {
        $empresa = Empresa::findOrFail($id);
        $empresa->nombre = 'Nombre modificado';
        $empresa->save();
        return redirect()->route('empresas.index');
    }
}
