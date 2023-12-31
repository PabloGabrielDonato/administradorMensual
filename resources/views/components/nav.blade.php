<nav class="navbar bg-body-tertiary d-block">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            @auth
            <li class="nav-item">
            <a class="nav-link" href="{{ route('alumnos.index') }}">Alumnos</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('disciplinas.index') }}">Disciplinas</a>
            </li>
            @else
            <li class="nav-item ">
                <a class="nav-link" href="/login">Iniciar sesion</a>
            </li> 
            @endauth
        </ul>
        <form class="d-flex mt-3" role="search" action="/logout" method="POST">
        @csrf
            <button type="submit" class="btn btn-danger">CERRAR SESION</button>
        </form>
      </div>
    </div>
  </div>
</nav>




                
        