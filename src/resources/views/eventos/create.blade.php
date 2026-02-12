<div>
    <form action="" method="POST">
        @csrf
        <label for="nombre">Nombre del evento:</label>
        <input type="text" name="nombre" id=""><br>
        @error('nombre')
            <span>{{ $message }}</span>
        @enderror
        <br>
        <label for="tipo_evento">Tipo de evento:</label>
        <input type="text" name="tipo_evento" id=""><br>
        @error('tipo_evento')
            <span>{{ $message }}</span>
        @enderror
        <br>
        <label for="tipo_terreno"></label>
        <input type="text" name="tipo_terreno" id=""><br>
        @error('tipo_terreno')
            <span>{{ $message }}</span>
        @enderror
        <br>
        <label for="ubicacion"></label>
        <input type="text" name="ubicacion" id=""><br>
        @error('ubicacion')
            <span>{{ $message }}</span>
        @enderror
        <br>
        <label for="fecha">Fecha del evento: </label>
        <input type="date" name="fecha" id=""><br>
        @error('fecha')
            <span>{{ $message }}</span>
        @enderror
        <br>
        <label for="descripcion">Descripción del evento: </label>
        <input type="text" name="descripcion" id=""><br>
        @error('descripcion')
            <span>{{ $message }}</span>
        @enderror
        <br>
        <label for="imagen">Imagen del evento:</label>
        <input type="file" name="imagen" id=""><br>
        @error('imagen')
            <span>{{ $message }}</span>
        @enderror
        <br>
        <input type="submit" value="Crear evento">
    </form>
</div>
