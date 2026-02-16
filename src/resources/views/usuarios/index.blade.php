<div>
    <div>
        <h1>Usuarios</h1>
   @foreach ($usuarios as $usuario)
            <article>
                <h1>{{ $usuario->nombre }} </h1>
                <!-- Mirar a ver como llamamos el nombre del anfitrion -->
                 <a href="usuarios/ {{ $usuario->id }}"><button>Ver detalles</button></a>
                 <a href="usuarios/ {{ $usuario->id }}/edit"><button>Modificar usuario</button></a>
                 <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button type="submit" onclick="return confirm('Seguro que quieres borrar')">Eliminar</button>
                 </form>
            </article> 
        @endforeach
</div>

</div>
