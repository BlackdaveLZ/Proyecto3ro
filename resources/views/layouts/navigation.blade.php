<div class="container-fluid bg-primary">
  <nav class="navbar">
    <div class="container">

      <a class="navbar-brand " href="{{route('dashboard')}}">Inicio</a>
      <a class="navbar-brand " href="{{route('cursos.index')}}">Cursos</a>






      <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    {{Auth::user()->usu_nombres }}/{{ Auth::user()->name }}
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="{{route('profile.edit')}}">Perfil</a></li>
    <li><a class="dropdown-item" onclick="event.preventDefault();cerrarSession.submit()" href="#">cerrar sesion</a></li>
    <form action="{{ route('logout') }}" id="cerrarSession" method="POST">
    @csrf
    </form>

  </ul>
</div>




    </div>
  </nav>
</div>