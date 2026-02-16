<div>

    <h1><strong>Nick: </strong> {{$usuario->nick}}</h1>
    <h3><strong>Nombre: </strong> {{$usuario->nombre}}</h3>
    <h3><strong>Apellidos: </strong> {{$usuario->nombre}}</h3>
    <h3><strong>Email: </strong> {{$usuario->nombre}}</h3>
    <h3><strong>Karma: </strong> {{$usuario->karma}}</h3>
    <img src="{{ $usuario->avatar }}" alt="Avatar de {{ $usuario->nick }}">
    <a href="{{ $usuario->id }}/edit"><button>Editar avatar</button></a>

</div>