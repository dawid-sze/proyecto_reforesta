<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/style.css">
</head>

<body>
    @include('navegacion')
    <div class="eventos">
        @if ($eventos->isEmpty())
            <p>No hay eventos</p>
        @else
            <section>
                @foreach ($eventos as $evento)
                    <article>
                        <h1>{{ $evento->nombre }} </h1>
                        <p>{{ $evento->ubicacion }}</p>
                        <!-- Mirar a ver como llamamos el nombre del anfitrion -->
                        <p>{{ $evento->tipo_evento }}</p>
                        <a href="eventos/ {{ $evento->id }}"><button>Ver detalles</button></a>
                        @if (auth()->check() && auth()->user()->id == $evento->id_anfitrion)
                            <a href="eventos/ {{ $evento->id }}/edit"><button>Modificar evento</button></a>
                            <form action="{{ route('eventos.destroy', $evento->id) }}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit" onclick="return confirm('Seguro que quieres borrar')">Eliminar</button>
                            </form>
                        @endif
                    </article>
                @endforeach
            </section>
        @endif
    </div>
</body>

</html>