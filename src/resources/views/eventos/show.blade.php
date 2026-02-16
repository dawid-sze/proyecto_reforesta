<div>
    <h1>{{ $evento->nombre }}</h1>
    <h3>{{ $evento->tipo_evento }}</h3>
    <h3>{{ $evento->tipo_terreno }}</h3>
    <h3>{{ $evento->ubicacion }}</h3>
    <h3>{{ $evento->fecha }}</h3>
    <h3>{{ $evento->anfitrion->nombre }}</h3>
    <h3>{{ $evento->descripcion }}</h3>
    <img src="{{ $evento->imagen }}" alt="">
    <a href="{{ $evento->id }}/edit"><button>Editar evento</button></a>
</div>
