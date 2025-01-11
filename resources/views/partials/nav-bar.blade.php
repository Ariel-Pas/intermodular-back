<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Web Intermodular</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="{{route('inicio')}}">Inicio</a>
          <a class="nav-link" href="{{route('empresas.index')}}">Empresas</a>
          <a class="nav-link" href="{{route('centros.index')}}">Centros</a>

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
