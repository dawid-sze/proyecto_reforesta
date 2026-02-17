<nav>
   <a href="{{ '/' }}">Inicio</a>
   <a href="{{ '/especies' }}">Especies</a>
   @if(auth()->check())
   <a href="/logout">Cerrar sesión</a>
   <a href="{{ '/eventos/create/' }}">Crear Eventos</a>
   <a href="/usuarios/{{ auth()->user()->id }}">Ver perfil</a>
   @else
   <a href="{{ '/usuarios/create' }}">Registro</a>
   <a href="{{ '/login_form' }}">Login</a>
   @endif
</nav>
