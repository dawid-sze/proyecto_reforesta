<div>
    <form action="" method="POST">
        @csrf
        <label for="nombre">Nombre del evento:</label>
        <input type="text" name="nombre" id="" value="{{ old('nombre') }}"><br>
        @error('nombre')
            <span>{{ $message }}</span>
        @enderror
        <br>
        <label for="tipo_evento">Tipo de evento:</label>
        <input type="text" name="tipo_evento" id="" value="{{ old('tipo_evento') }}"><br>
        @error('tipo_evento')
            <span>{{ $message }}</span>
        @enderror
        <br>
        <label for="tipo_terreno"></label>
        <input type="text" name="tipo_terreno" id="" value="{{ old('tipo_terreno') }}"><br>
        @error('tipo_terreno')
            <span>{{ $message }}</span>
        @enderror
        <br>
        <label for="ubicacion"></label>
        <input type="text" name="ubicacion" id="" value="{{ old('ubicacion') }}"><br>
        @error('ubicacion')
            <span>{{ $message }}</span>
        @enderror
        <br>
        <label for="fecha">Fecha del evento: </label>
        <input type="date" name="fecha" id="" value="{{ old('fecha') }}"><br>
        @error('fecha')
            <span>{{ $message }}</span>
        @enderror
        <br>
        <label for="descripcion">Descripción del evento: </label>
        <input type="text" name="descripcion" id="" value="{{ old('descripcion') }}"><br>
        @error('descripcion')
            <span>{{ $message }}</span>
        @enderror
        <br>
        <label for="imagen">Imagen del evento:</label>
        <input type="file" name="imagen" id="" value="{{ old('imagen') }}"><br>
        @error('imagen')
            <span>{{ $message }}</span>
        @enderror
        <br>
        <input type="submit" value="Crear evento">
    </form>
</div>
