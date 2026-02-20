<div>
    <section>
        @foreach ($eventos as $evento)
            <article>

                <div class="cabeceraEvento" style="background-image: url({{ $evento->imagen }});">
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
                    @if($participa)
                         <form action="{{ route('signOff', [$evento->id , false]) }} " method="POST">
                            @csrf
                            @method('POST')
                            <input type="submit" value="Desuscribirse">
                        </form>
                    @else
                        <form action="{{ route('signUp', $evento->id) }} " method="POST">
                            @csrf
                            @method('POST')
                            <input type="submit" value="Suscribirse">
                        </form>
                    @endif
                </div>

                <h3><strong>Ubicación: </strong>{{ $evento->ubicacion }}</h3>
                <h3><strong>Anfitrión: </strong>{{ $evento->anfitrion->nombre }}</h3>
                <h3><strong>Tipo de Evento: </strong>{{ $evento->tipo_evento }}</h3>
                <a href="eventos/ {{ $evento->id }}"><button>Ver detalles</button></a>
                @if (auth()->check() && auth()->user()->id == $evento->anfitrion_id)
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
</div>