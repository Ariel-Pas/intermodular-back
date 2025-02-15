<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpresaWebRequest;
use App\Http\Requests\EmpresaWebUpdateRequest;
use App\Models\Categoria;
use App\Models\Empresa;
use Flogti\SpanishCities\Models\Province;
use Flogti\SpanishCities\Models\Community;
use Flogti\SpanishCities\Models\Town;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;

class EmpresaController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //este es para el admin
        $empresas = Empresa::orderBy('nombre')->paginate(8);

        return view('empresas.empresas', compact('empresas'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $empresa = null;
        $serviciosEmpresa = null;
        $provincias = Community::find(10)->provinces;
        $municipios = Town::select('id','province_id', 'name')->whereIn('province_id', ['3', '12', '46'])->get();
        $categorias = Categoria::with('servicios')->get();
        return view('empresas.create', compact(['provincias','municipios', 'categorias', 'empresa', 'serviciosEmpresa']));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(EmpresaWebRequest $request)
    {
        //dd($request->servicios);
        $empresa = new Empresa();
        $empresa->nombre = $request->nombre;
        $datos = $request->only(['nombre', 'cif', 'descripcion', 'email', 'direccion', 'coordX', 'coordY', 'vacantes']);
        $datos['finSemana'] = $request->has('finSemana');
        $datos['town_id'] = $request->poblacion;
        //horario
        $datos['horario_manana'] = $request['apManana'];
        $datos['horario_tarde'] = $request['apTarde'];

        $empresa = new Empresa($datos);
        $empresa->token = Str::uuid();
        $nombre = time().'.'.$request->file('imagen')->extension();
        $path = $request->file('imagen')->store($nombre, 'public');
        $empresa->imagen = asset("/storage/".$path);
        $empresa->save();
        foreach($request->servicios as $servicio)
        {
            $categoriaServicio = explode('-', $servicio);
            DB::table('empresa_cat')->insert([
                'empresa_id' => $empresa->id,
                'categoria_id' => $categoriaServicio[0],
                'servicio_id' => $categoriaServicio[1]
            ]);
        }

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
        $empresa = Empresa::find($id);

        $serviciosEmpresa = DB::table('empresa_cat')->where('empresa_id', '=', $id)->get();
        //dd($serviciosEmpresa);
        $provincias = Community::find(10)->provinces;
        $municipios = Town::select('id','province_id', 'name')->whereIn('province_id', ['3', '12', '46'])->get();
        $categorias = Categoria::with('servicios')->get();
        return view('empresas.create', compact(['provincias','municipios', 'categorias', 'empresa', 'serviciosEmpresa']));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmpresaWebUpdateRequest $request, string $id)
    {
        $empresa = Empresa::find($id);
        $empresa->nombre = $request->nombre;
        $datos = $request->only(['nombre', 'cif', 'descripcion', 'email', 'direccion', 'coordX', 'coordY', 'vacantes']);
        $datos['finSemana'] = $request->has('finSemana');
        $datos['town_id'] = $request->poblacion;
        //horario
        $datos['horario_manana'] = $request['apManana'];
        $datos['horario_tarde'] = $request['apTarde'];

        $empresa->update($datos);

        if($request->imagen){
            $nombre = time().'.'.$request->file('imagen')->extension();
            $path = $request->file('imagen')->store($nombre, 'public');
            $empresa->imagen = asset("/storage/".$path);
            $empresa->save();
        }

        //borrar servicios asociados hasta el momento
        DB::table('empresa_cat')->where('empresa_id', '=', $id)->delete();
        //asociar nuevos servicios
        foreach($request->servicios as $servicio)
        {
            $categoriaServicio = explode('-', $servicio);
            DB::table('empresa_cat')->insert([
                'empresa_id' => $empresa->id,
                'categoria_id' => $categoriaServicio[0],
                'servicio_id' => $categoriaServicio[1]
            ]);
        }
        foreach($request->servicios as $servicio)
        {
            $categoriaServicio = explode('-', $servicio);
            DB::table('empresa_cat')->insert([
                'empresa_id' => $empresa->id,
                'categoria_id' => $categoriaServicio[0],
                'servicio_id' => $categoriaServicio[1]
            ]);
        }

        return redirect()->route('empresas.index')->with('msg', "Empresa $request->nombre actualizada con éxito");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Empresa::findOrFail($id)->delete();

        return redirect()->route('empresas.index');
    }


    public function leerImagen(){

    }

    public function generarPDF(){
        $empresas = Empresa::all();
        $pdf = Pdf::loadView('empresas.pdf', ['empresas' =>$empresas]);
        return $pdf->download('empresas.pdf');
    }


}
