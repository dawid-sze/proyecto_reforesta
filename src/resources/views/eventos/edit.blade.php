<div>
    <form action="" method="POST">
        @csrf
        @method("PUT")
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
        <input type="submit" value="Modificar evento">
    </form>
</div>
