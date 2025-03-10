<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Web Intermodular</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            {{-- href="{{route('inicio')}}" --}}
          {{-- <a class="nav-link active" aria-current="page" >Inicio</a>
          <a class="nav-link" href="{{route('empresas.index')}}">Empresas</a> --}}

          {{-- FUNCIONA --}}
          {{-- <a class="nav-link" href="{{url('http://localhost:4200/dashboard')}}">Empresas TEST</a>
          <a class="nav-link" href="{{route('centros.index')}}">Centros</a>

          <a class="nav-link" href="{{route('solicitudes.index')}}">Solicitudes</a>

          <a class="nav-link" href="{{route('resenias.index')}}">Reseñas</a> --}}

          @if(auth()->check())
            <a class="nav-link" href="{{route('logout')}}">
                <button class="btn btn-primary">Logout</button>
            </a>
          @endif

          @if(auth()->guest())
            <a class="nav-link" href="{{route('login')}}">
                <button class="btn btn-primary">Login</button>
            </a>
          @endif

        </div>
      </div>
    </div>
  </nav>
