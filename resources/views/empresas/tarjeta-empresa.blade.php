<div class="card col-2" style="width: 18rem;">
    <img src="https://images.unsplash.com/photo-1664575602276-acd073f104c1?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTR8fGVtcHJlc2F8ZW58MHx8MHx8fDA%3D" class="card-img-top" >
    <div class="card-body">
      <h5 class="card-title">{{$empresa['nombre']}}</h5>
      <p class="card-text">{{$empresa['descripcion']}}</p>

    <div class="row">
        <div class="col-6">
            <a href="{{route('empresas.show',['empresa' => $empresa['id']] ) }}" class="btn btn-primary">Más info</a>
        </div>
        <div class="col-6">
            <form action="{{route('empresas.destroy',['empresa' => $empresa['id']])}}" method="POST">
                @method('DELETE')
                @csrf
                <input class="btn btn-danger" type="submit" value="Eliminar">
            </form>
        </div>
    </div>
   </div>
  </div>
