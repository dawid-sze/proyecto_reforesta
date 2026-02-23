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
    <main>
        <div class="cabeceraEvento"
            style="color:white;padding:5px;min-height:20%; background-image: url({{ $evento->imagen }}),url('/placeholderEvento.avif'); background-repeat: no-repeat; background-size: cover;">
            <h1>{{ $evento->nombre }} </h1>
            <?php 
            $participa = false;
         ?>
            @if(auth()->check())
                @foreach ($evento->participantes as $participante)
                    @if ($participante->id == auth()->user()->id)
                        <?php 
                                                            $participa = true;
                                                        ?>
                    @endif
                @endforeach
            @endif()
            @if($evento->estado_evento == 0)
                @if($participa)
                    <form action="{{ route('signOff', [$evento->id, 1]) }} " method="POST">
                        @csrf
                        @method('POST')
                        <input class="button desuscribirse" type="submit" value="Desuscribirse">
                    </form>
                @else
                    <form action="{{ route('signUp', $evento->id) }} " method="POST">
                        @csrf
                        @method('POST')
                        <input class="button desuscribirse" type="submit" value="Suscribirse">
                    </form>
                @endif
            @endif
        </div>
        <h3>{{ $evento->tipo_evento }}</h3>
        <h3>{{ $evento->tipo_terreno }}</h3>
        <h3>{{ $evento->ubicacion }}</h3>
        <h3>{{ $evento->fecha }}</h3>
        <h3>{{ $evento->anfitrion->nombre }}</h3>
        <h3>{{ $evento->descripcion }}</h3>
        <h3>{{ count($evento->especies) != 0 ? $evento->especies[0]->nombre : "Sin ninguna especie indicada" }}</h3>
        <h3><strong>Número de participantes: </strong>{{ count($evento->participantes) }}</h3>
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
</main>
</body>

</html>