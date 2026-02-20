<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evento {{ $evento->nombre }}</title>
    <link rel="stylesheet" href="/index.css">
</head>

<body>
    @include('navegacion')
    <div>
        <button>Suscribirse</button>
        <h1>{{ $evento->nombre }}</h1>
        <h3>{{ $evento->tipo_evento }}</h3>
        <h3>{{ $evento->tipo_terreno }}</h3>
        <h3>{{ $evento->ubicacion }}</h3>
        <h3>{{ $evento->fecha }}</h3>
        <h3>{{ $evento->anfitrion->nombre }}</h3>
        <h3>{{ $evento->descripcion }}</h3>
        <img src="{{ asset($evento->imagen) }}" alt="Imagen de " . {{ $evento->nombre }}>
        <a href="{{ asset($evento->pdf) }}"><button>Descargar PDF</button></a>
        @if (auth()->check() && auth()->user()->id == $evento->anfitrion_id)
            <a href="{{ $evento->id }}/edit"><button>Editar evento</button></a>
            <form action="{{ route('eventos.destroy', $evento->id) }}" method="POST">
                @csrf
                @method("DELETE")
                <button type="submit" onclick="return confirm('Seguro que quieres borrar')">Eliminar</button>
            </form>
        @endif
    </div>
</body>

</html>