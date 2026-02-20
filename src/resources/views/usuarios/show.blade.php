<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de {{ $usuario->nick }}</title>
    <link rel="stylesheet" href="/index.css">
</head>

<body>
    @include('navegacion')
    <div>

        <h1><strong>Nick: </strong> {{$usuario->nick}}</h1>
        <h3><strong>Nombre: </strong> {{$usuario->nombre}}</h3>
        <h3><strong>Apellidos: </strong> {{$usuario->nombre}}</h3>
        <h3><strong>Email: </strong> {{$usuario->nombre}}</h3>
        <h3><strong>Karma: </strong> {{$usuario->karma}}</h3>
        <img class="avatar-show" width="50px" src="{{ $usuario->avatar}}" alt="Avatar de {{ $usuario->nick }}">
        @if(auth()->check() && auth()->user()->id == $usuario->id)
            <a href="{{ $usuario->id }}/edit"><button>Editar avatar</button></a>
        @endif

        @foreach ($usuario->hospeda as $evento)
            <article>
                <h1>{{ $evento->nombre }} </h1>
                <p>{{ $evento->ubicacion }}</p>
                <!-- Mirar a ver como llamamos el nombre del anfitrion -->
                <p>{{ $evento->tipo_evento }}</p>
                <a href="{{ route("eventos.show", $evento->id) }}"><button>Ver detalles</button></a>
                @if (auth()->check() && auth()->user()->id == $evento->id_anfitrion)
                    <a href="{{ route("eventos.edit", $evento->id) }}"><button>Modificar evento</button></a>
                    <form action="{{ route('eventos.destroy', $evento->id) }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" onclick="return confirm('Seguro que quieres borrar')">Eliminar</button>
                    </form>
                @endif
            </article>
        @endforeach
    </div>
</body>

</html>